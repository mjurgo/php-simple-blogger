<?php

declare(strict_types=1);

namespace App\Models;

class User extends BaseModel
{
    protected array $allowedProperties = ['login', 'password', 'username'];

    public static function auth(string $login, string $password)
    {
        $user = User::findBy('login', $login);

        if (password_verify($password, $user->password))
        {
            $_SESSION['auth'] = true;
            $_SESSION['username'] = $user->username;
            $_SESSION['id'] = $user->id;
        }
        else
        {
            dump('no niestety, błędne dane');
        }
    }
}
