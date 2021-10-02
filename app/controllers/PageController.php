<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\User;

class PageController
{
    public function home()
    {
        return view('pages/home');
    }

    public function about()
    {
        return view('pages/about');
    }
}
