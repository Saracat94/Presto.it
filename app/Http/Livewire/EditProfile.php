<?php

namespace App\Http\Livewire;

use App\Models\Profile;
use Livewire\Component;

class EditProfile extends Component
{
    public $profileId;
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


    public function updateProfile(){

        $profile = Profile::find($this->profileId);
        $profile->update(
            [
                'name' => $this->name,
                'surname' => $this->surname,
                'birth' => $this->birth,
                'address' => $this->address,
                'gender' => $this->male ? 'Uomo' : ($this->female ? 'Donna' : ($this->other ? 'Altro' : null)),
                'country' => $this->country,
                'city' => $this->city,
                'cap' => $this->cap,
                'tel' => $this->tel,
            ]
        );
        return redirect()->route('showProfile');
    }

    public function mount($profileId) {
        $profile = Profile::find($profileId);

        $this->profileId = $profile->id;
        $this->name = $profile->name;
        $this->surname = $profile->surname;
        $this->birth = $profile->birth;
        $this->address = $profile->address;
        // $this->gender = $profile->gender;
        $this->male = $profile->gender === 'Uomo';
        $this->female = $profile->gender === 'Donna';
        $this->other = $profile->gender === 'Altro';
        $this->country = $profile->country;
        $this->city = $profile->city;
        $this->cap = $profile->cap;
        $this->tel = $profile->tel;
    }

    public function render()
    {
        return view('livewire.edit-profile');
    }
}
