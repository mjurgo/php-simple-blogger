<?php

declare(strict_types=1);

namespace App\Models;

class User extends BaseModel
{
    protected array $allowedProperties = ['login', 'password', 'username'];

    public function comments()
    {
        return Comment::findAllBy('user_id', $this->id);
    }
}
