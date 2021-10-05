<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Auth;
use App\Models\User;

class UserController extends BaseController
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
            'login' => $this->request->post('login'),
            'password' => password_hash($this->request->post('password'), PASSWORD_BCRYPT),
            'username' => $this->request->post('username'),
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
        return redirect('/');
    }

    public function authenticate()
    {
        Auth::auth(
            $this->requqest->post('login'),
            $this->request->post('password')
        );

        return redirect('/');
    }

    public function destroy(int $id)
    {
        Auth::requireLogin();
        Auth::requireAdmin();

        User::delete($id);

        return redirect('/admin');
    }
}
