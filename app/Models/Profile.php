<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'surname',
        'birth',
        'address',
        'gender',
        'tel',
        'country',
        'city',
        'cap',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
