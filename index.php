<?php

declare(strict_types=1);

require('vendor/autoload.php');

require_once('core/helpers.php');
require('core/bootstrap.php');


Router::init('app/routes.php')
    ->proceed($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
