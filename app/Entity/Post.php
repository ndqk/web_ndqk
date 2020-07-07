<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use Sluggable;
    protected $table="posts";

    protected $fillable=['title', 'slug', 'category_id', 'content', 'user_id', 'view', 'status'];

    public function sluggable(){
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
