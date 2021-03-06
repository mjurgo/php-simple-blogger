<?php

declare(strict_types=1);

namespace App\Models;

class Comment extends BaseModel
{
    protected array $allowedProperties = ['body', 'post_id', 'user_id'];

    public function author()
    {
        return User::find((int)$this->user_id);
    }

    public function post()
    {
        return Post::find((int)$this->post_id);
    }
}
