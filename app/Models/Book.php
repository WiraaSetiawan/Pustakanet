<?php

namespace App\Models;
use Cviebrock\EloquentSluggable\Sluggable;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use Sluggable;
    protected $primaryKey = 'id';
    protected $fillable = ['book_code', 'title','slug', 'pages','sipnosis' ,'author', 'publish_year','status','cover_img'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'book_categories','book_id','category_id');
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
  
}