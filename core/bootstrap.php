<?php

declare(strict_types=1);

use App\Core\App;
use App\Models\BaseModel;

App::bind('config', require('core/config.php'));
App::bind('db', Connection::make(App::get('config')['database']));
