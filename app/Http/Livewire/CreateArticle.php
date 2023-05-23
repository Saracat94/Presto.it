<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;
use App\Models\Category;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use Livewire\WithFileUploads;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CreateArticle extends Component
{
    use WithFileUploads;
    public $title;
    public $subtitle;
    public $body;
    public $validated;
    public $article;
    public $temporary_images;
    public $images = [];
    public $price;
    public $category;

    protected $rules = [
        'title' => 'required|min:4',
        'subtitle' => 'required|min:4',
        'body' => 'required|min:4',
        'price' => 'required|numeric',
        'category' => 'required',
        'images.*' => 'image|max:1024',
        'temporary_images.*' => 'image|max:1024'
    ];

    protected $messages = [
        'required' => 'il campo è obbligatorio',
        'min' => 'il campo deve avere minimo 4 caratteri',
        'numeric' => 'il campo può contenere solo numeri',
        'images.max' => "l'immagine deve essere massimo di 1MB",
        'temporary_images.required' => "L' immagine è richiesta",
        'temporary_images.image' => "i file devono essere immagini",
        'temporary_images.max' => "l'immagine deve essere massimo di 1MB",
    ];

    public function updatedTemporaryImages()
    {
        $this->validate([
            'temporary_images.*' => 'image|max:1024',
        ]);

        foreach ($this->temporary_images as $image) {
            $this->images[] = $image;
        }
    }

    public function removeImage($key)
    {
        if (in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
        }
    }


    public function CreateArticle()
    {
        $this->validate();
        $this->article = Category::find($this->category)->articles()->create($this->validate());

        if (count($this->images)) {

            foreach ($this->images as $image) {

                // $this->article->images()->create(['path' => $image->store('images', 'public')]);

                $newFileName = "articles/{$this->article->id}";
                $newImage = $this->article->images()->create(['path' => $image->store($newFileName, 'public')]);

                RemoveFaces::withChain([
                    new ResizeImage($newImage->path, 480, 480),
                    new GoogleVisionSafeSearch($newImage->id),
                    new GoogleVisionLabelImage($newImage->id),
                ])->dispatch($newImage->id);
            }

            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }

        $this->article->user()->associate(Auth::user());
        $this->article->save();

        session()->flash('message', 'Annuncio creato con successo, in attesa di approvazione.');
        $this->cleanForm();
        return redirect(route('articleIndex'));
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    protected function cleanForm()
    {
        $this->title = '';
        $this->subtitle = '';
        $this->body = '';
        $this->price = '';
        $this->category = '';
        $this->temporary_images = [];
        $this->images = [];
    }

    // public function articleDelete($id)
    // {
    //     Article::find($id)->delete();
    // }


    public function render()
    {
        return view('livewire.create-article');
    }
}
