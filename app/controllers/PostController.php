<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Auth;
use App\Models\Post;
use App\Models\Comment;

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
        // TODO: Zoptymalizować, żeby pobierało od razu użytkowników - with z laravela
        $comments = Comment::findAllBy('post_id', $id);

        return view('posts/show', ['post' => $post, 'comments' => $comments]);
    }

    public function new()
    {
        Auth::requireAdmin();
        return view('posts/new');
    }

    public function create()
    {
        Auth::requireAdmin();
        Post::create($_POST);

        return redirect('/posts');
    }

    public function edit(int $id)
    {
        Auth::requireAdmin();
        $post = Post::find($id);

        return view('posts/edit', ['post' => $post]);
    }

    public function update(int $id)
    {
        Auth::requireAdmin();
        Post::update($id, $_POST);

        return redirect("/posts/{$id}");
    }

    public function destroy(int $id)
    {
        Auth::requireAdmin();
        Post::delete($id);

        return redirect('/posts');
    }
}
