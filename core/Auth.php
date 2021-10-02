<?php

declare(strict_types=1);

namespace App\Core;

use App\Models\User;

class Auth
{
    public static function isAdmin(): bool
    {
        return isset($_SESSION['username']) ? User::findBy('username', $_SESSION['username'])->role === 'admin' : false;
    }

    public static function requireAdmin(): void
    {
        if (!self::isAdmin())
        {
            redirect('/', 'You must be an admin to access this page.');
        }
    }

    public static function auth(string $login, string $password): void
    {
        $user = User::findBy('login', $login);

        if (password_verify($password, $user->password))
        {
            $_SESSION['auth'] = true;
            $_SESSION['username'] = $user->username;
        }
        else
        {
            dump('no niestety, błędne dane');
        }
    }
}
