<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Post;

class PostController
{
    public function index()
    {
        $posts = Post::all();

        return view('posts/index', ['posts' => $posts]);
    }

    public function show(int $id)
    {
        $post = Post::find($id);

        return view('posts/show', ['post' => $post]);
    }
}
