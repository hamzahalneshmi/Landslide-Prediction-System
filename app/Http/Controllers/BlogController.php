<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Comment;
class BlogController extends Controller
{
    //
    public function index()
    {
        return view("FEpartials.blog.singlepost");
    }
    public function show($id)
    {
        $categories = Category::all();
        $post = Post::findOrFail($id);
        $post->increment('view_count');
        $popular_posts = Post::orderBy('view_count', 'desc')->take(6)->get();

        return view("FEpartials.blog.singlepost", compact('post','categories','popular_posts'));
    }
}
