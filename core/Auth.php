<?php

declare(strict_types=1);

namespace App\Core;

use App\Models\User;
use Exception;

class Auth
{
    public static function isAdmin(): bool
    {
        return isset($_SESSION['id']) ? User::find((int)$_SESSION['id'])->role === 'admin' : false;
    }

    public static function requireAdmin(): void
    {
        if (!self::isAdmin())
        {
            redirect('/', 'Nie masz dostępu do tej strony.');
        }
    }

    public static function requireLogin(): void
    {
        if (!loggedIn())
        {
            redirect('/login', 'Musisz być zalogowany, żeby wyświetlić tę stronę.');
        }
    }

    public static function requireCurrentUser(int $id): void
    {
        if (!((int)self::user()->id == $id))
        {
            redirect('/', 'Nie masz dostępu do tej strony.');
        }
    }

    public static function auth(string $login, string $password): bool
    {
        try
        {
            $user = User::findBy('login', $login);
        }
        catch (Exception $e)
        {
            dump('nie ma takiego użytkownika');
        }

        if (password_verify($password, $user->password))
        {
            $_SESSION['auth'] = true;
            $_SESSION['id'] = $user->id;
            return true;
        }
        else
        {
            dump('no niestety, błędne dane');
            return false;
        }
    }

    public static function user()
    {
        return User::find((int)$_SESSION['id']) ?? null;
    }
}
