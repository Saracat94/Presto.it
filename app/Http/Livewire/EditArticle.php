<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class EditArticle extends Component
{
    use WithFileUploads;
    public $articleId;
    public $title;
    public $subtitle;
    public $body;
    public $validated;
    public $article;
    public $temporary_images;
    public $images = [];
    public $price;
    public $category;

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


    public function updateArticle(){

        $article = Article::find($this->articleId);
        
        $article->update(
            [
                'title' => $this->title,
                'subtitle' => $this->subtitle,
                'body' => $this->body,
                'validated' => $this->validated,
                'temporary_images' => $this->temporary_images,
                'images' => $this->images,
                'price' => $this->price,
                'category' => $this->category,
            ]
        );
        return redirect()->route('articleDet');
    }

    public function mount($articleId) {
        $article = Article::find($articleId);

        $this->articleId = $article->id;
        $this->title = $article->title;
        $this->subtitle = $article->sursubtitle;
        $this->body = $article->body;
        $this->validated = $article->validated;
        // $this->temporary_images = $article->temporary_images;
        $this->images = $article->images;
        $this->price = $article->price;
        $this->category = $article->category;
    }

    public function render()
    {
        return view('livewire.edit-article');
    }
}
