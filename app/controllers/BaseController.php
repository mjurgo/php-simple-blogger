<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Request;

class BaseController
{
    protected Request $request;

    public function __construct()
    {
        $this->request = new Request($_GET, $_POST);
    }
}
