<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Auth;
use App\Models\Page;
use App\Models\Post;
use App\Models\User;

class AdminController extends BaseController
{
  public function admin()
  {
    Auth::requireLogin();
    Auth::requireAdmin();

    $posts = Post::all();
    $users = User::all();

    return view('admin/admin', [
      'posts' => $posts,
      'users' => $users,
    ]);
  }

  public function posts()
  {
    Auth::requireLogin();
    Auth::requireAdmin();

    return view('admin/posts', ['posts' => Post::all()]);
  }

  public function users()
  {
    Auth::requireLogin();
    Auth::requireAdmin();

    return view('admin/users', ['users' => User::all()]);
  }

  public function pages()
  {
    Auth::requireLogin();
    Auth::requireAdmin();

    return view('admin/pages', ['pages' => Page::all()]);
  }
}
