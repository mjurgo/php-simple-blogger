<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Auth;
use App\Models\User;
use Exception;

class UserController extends BaseController
{
    public function show(int $id)
    {
        Auth::requireCurrentUser($id);

        return view('users/show', ['user' => User::find($id)]);
    }

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
        $this->authenticate();

        return redirect('/');
    }

    public function update(int $id)
    {
        $updateParams = [
            'username' => $this->request->post('username'),
            'login' => $this->request->post('login'),
        ];

        if ($this->request->post('password'))
        {
            if (password_verify(
                $this->request->post('current_password'), Auth::user()->password)
            )
                $updateParams['password'] = password_hash(
                    $this->request->post('password'),
                    PASSWORD_BCRYPT
                );
            else
            {
                throw new Exception('Could not verify current password.');
            }
        }
        
        User::update($id, $updateParams);

        return redirect("/users/{$id}");
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
        unset($_SESSION['id']);
        return redirect('/');
    }

    public function authenticate()
    {
        if (Auth::auth(
            $this->request->post('login'),
            $this->request->post('password')
        ))
        {
            return redirect('/', 'Zalogowano.');
        }

        return redirect('/login', 'Błędne dane.');
    }

    public function destroy(int $id)
    {
        Auth::requireLogin();
        Auth::requireAdmin();

        User::delete($id);

        return redirect('/admin');
    }
}
