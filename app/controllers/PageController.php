<?php

declare(strict_types=1);

namespace App\Controllers;

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
