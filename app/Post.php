<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'author_id',
        'title',
        'slug',
        'excerpt',
        'body',
        'image',
        'view_count',
        'category_id'
    ];            
    protected $primaryKey = "id";

    public function user(){
        return $this->belongsTo('App\User', 'author_id');
    }
    public function category(){
        return $this->belongsTo('App\Category', 'category_id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }
}
