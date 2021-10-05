<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Auth;
use App\Models\Post;
use App\Models\Comment;

class PostController extends BaseController
{
    public function index()
    {
        return view('posts/index', ['posts' => Post::all()]);
    }

    public function show(int $id)
    {
        // TODO: Zoptymalizować, żeby pobierało od razu użytkowników - with z laravela

        return view('posts/show', [
            'post' => Post::find($id),
            'comments' => Comment::findAllBy('post_id', $id)
        ]);
    }

    public function new()
    {
        Auth::requireAdmin();
        return view('posts/new');
    }

    public function create()
    {
        Auth::requireAdmin();
        Post::create($this->request->post());

        return redirect('/posts');
    }

    public function edit(int $id)
    {
        Auth::requireAdmin();

        return view('posts/edit', ['post' => Post::find($id)]);
    }

    public function update(int $id)
    {
        Auth::requireAdmin();
        Post::update($id, $this->request->post());

        return redirect("/posts/{$id}");
    }

    public function destroy(int $id)
    {
        Auth::requireAdmin();
        Post::delete($id);

        return redirect('/posts');
    }
}
