<?php

namespace App\Models;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model

{
    use Sluggable;
    protected $table = 'categories'; 
    protected $fillable = ['name','slug'];
   
    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_categories');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    
}