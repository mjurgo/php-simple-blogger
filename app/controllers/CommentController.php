<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Comment;
use App\Models\User;

class CommentController extends BaseController
{
    public function create(int $postId)
    {
        if (!loggedIn())
        {
            return redirect('/');
        }

        // dump($_POST);
        $user = User::findBy('username', $_SESSION['username']);
        $attrs = [
            'post_id' => $postId,
            'user_id' => $user->id,
            'body' => $this->request->post('body'),
        ];
        Comment::create($attrs);

        return redirect("/posts/{$postId}");
    }
}
