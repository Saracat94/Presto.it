<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Article extends Model
{
    use HasFactory, Searchable;
    protected $fillable = [
        'title',
        'subtitle',
        'body',
        'image',
        'price',
        'user_id',
        'category_id',
        'is_accepted',
    ];

    public function toSearchableArray(){
        $category = $this->category;
        $array = [
            'id' => $this->id,
            'title' => $this->title,
            'body' => $this->body,
            'category' => $category,
        ];
        return $array;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function setAccepted($value){
        $this->is_accepted = $value;
        $this->save();
        return true;
    }

    public static function toBeRevisionedCount(){

        return Article::where('is_accepted', null)->count();
    }

    public function images(){

        return $this->hasMany(Image::class);
    }
}



