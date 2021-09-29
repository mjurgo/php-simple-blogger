<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\User;

class UserController
{
    public function register()
    {
        if (loggedIn())
        {
            return redirect('/');
        }
        
        return view('users/register');
    }

    public function create()
    {
        $userParams = [
            'login' => $_POST['login'],
            'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
            'username' => $_POST['username'],
        ];

        User::create($userParams);

        return redirect('/');
    }

    public function login()
    {
        if (loggedIn())
        {
            return redirect('/');
        }
        
        return view('users/login');
    }

    public function logout()
    {
        unset($_SESSION['auth']);
        unset($_SESSION['username']);
        unset($_SESSION['id']);
        return redirect('/');
    }

    public function authenticate()
    {
        User::auth($_POST['login'], $_POST['password']);

        return redirect('/');
    }
}
