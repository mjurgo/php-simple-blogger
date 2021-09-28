<?php

declare(strict_types=1);

use App\Core\App;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

App::bind('config', require('core/config.php'));
App::bind('db', Connection::make(App::get('config')['database']));
