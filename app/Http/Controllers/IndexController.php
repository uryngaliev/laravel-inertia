<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class IndexController extends Controller
{


    public function index()
    {
        $posts = Post::orderBy("id", "desc")->limit(6)->get();
        return Inertia::render('Home', [
            "title" => 'Home',
            "posts" => $posts,
        ]);
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return Inertia::render('Show', [
            "title" => 'О посте',
            "post" => $post
        ]);

    }
}
