<?php

declare(strict_types=1);

namespace App\Controllers;

class PageController
{
    public function home()
    {
        return require('app/views/home.view.php');
    }

    public function about()
    {
        return require('app/views/about.view.php');
    }
}
