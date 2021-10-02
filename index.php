<?php

declare(strict_types=1);

use App\Core\Router;

require('vendor/autoload.php');

require('core/bootstrap.php');
require_once('core/helpers.php');

Router::init('app/routes.php')
    ->proceed($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
