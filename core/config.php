<?php

declare(strict_types=1);

return [
    'database' => [
        'name' => $_ENV['DB_NAME'],
        'host' => $_ENV['DB_HOST'],
        'username' => $_ENV['DB_USERNAME'],
        'password' => $_ENV['DB_PASSWORD']
    ]
];
