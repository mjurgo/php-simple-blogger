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

    public function new()
    {
        return view('posts/new');
    }

    public function create()
    {
        Post::create($_POST);

        return redirect('/posts');
    }

    public function edit(int $id)
    {
        $post = Post::find($id);

        return view('posts/edit', ['post' => $post]);
    }

    public function update(int $id)
    {
        Post::update($id, $_POST);

        return redirect("/posts/{$id}");
    }

    public function destroy(int $id)
    {
        Post::delete($id);

        return redirect('/posts');
    }
}
