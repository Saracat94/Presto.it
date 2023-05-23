<?php

namespace App\Http\Livewire;

use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateProfile extends Component
{
    public $name;
    public $surname;
    public $birth;
    public $address;
    // public $gender;
    public $male;
    public $female;
    public $other;
    public $country;
    public $city;
    public $cap;
    public $tel;

    protected $rules = [
        'name' => 'required|min:3',
        'surname' => 'required|min:4',
        'birth' => 'required|date',
        'address' => 'required|min:4',
        // 'gender' => 'nullable', campo del genere non obbligatorio
        'country' => 'required',
        'city' => 'required|min:2',
        'cap' => 'required|max:5',
        'tel' => 'required',
    ];

    protected $messages = [
        'required' => 'Il campo è obbligatorio',
        'date' => 'usa il formato yyyy-mm-gg',
        'max' => 'Il campo deve avere massimo :max caratteri',
        'min' => 'Il campo deve avere almeno :min caratteri',
        'numeric' => 'Il campo può contenere solo numeri',
    ];


    public $countryOptions = [
        'Albania' => 'Albania',
        'Argentina' => 'Argentina',
        'Australia' => 'Australia',
        'Austria' => 'Austria',
        'Belgio' => 'Belgio',
        'Brasile' => 'Brasile',
        'Canada' => 'Canada',
        'Cina' => 'Cina',
        'Cipro' => 'Cipro',
        'Danimarca' => 'Danimarca',
        'Egitto' => 'Egitto',
        'Estonia' => 'Estonia',
        'Finlandia' => 'Finlandia',
        'Francia' => 'Francia',
        'Germania' => 'Germania',
        'Giappone' => 'Giappone',
        'Grecia' => 'Grecia',
        'India' => 'India',
        'Indonesia' => 'Indonesia',
        'Irlanda' => 'Irlanda',
        'Italia' => 'Italia',
        'Lussemburgo' => 'Lussemburgo',
        'Malta' => 'Malta',
        'Messico' => 'Messico',
        'Norvegia' => 'Norvegia',
        'Paesi Bassi' => 'Paesi Passi',
        'Polonia' => 'Polonia',
        'Regno Unito' => 'Regno Unito',
        'Russia' => 'Russia',
        'Spagna' => 'Spagna',
        'Svezia' => 'Svezia',
        'Svizzera' => 'Svizzera',
        'Stati Uniti' => 'Stati Uniti',
        'Ungheria' => 'Ungheria',
        'Turchia' => 'Turchia',
    ];

    public function CreateProfile()
    {
        $this->validate();

        $profile = Profile::create([
            'name' => $this-> name,
            'surname' => $this-> surname,
            'birth'=> $this-> birth,
            'address' => $this->address,
            'gender' => $this->male ? 'Uomo' : ($this->female ? 'Donna' : ($this->other ? 'Altro' : null)),
            'country' => $this->country,
            'city' => $this->city,
            'cap' => $this->cap,
            'tel' => $this->tel,
        ]);

        $profile->user()->associate(Auth::user());
        $profile->save();

        session()->flash('message', 'Profilo creato con successo!');
        $this->cleanForm();
        return redirect(route('articleIndex'));
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function cleanForm()
    {
        $this->name = '';
        $this->surname = '';
        $this->birth = '';
        $this->address = '';
        // $this->male = false;
        // $this->female = false;
        // $this->other = false;
        $this->country = '';
        $this->city = '';
        $this->cap = '';
        $this->tel = '';
    }

    public function render()
    {
        return view('livewire.create-profile');
    }
}
