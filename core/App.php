<?php

declare(strict_types=1);

namespace App\Core;

use Exception;

class App
{
    private static array $registry = [];

    public static function get(string $key)
    {
        if (!array_key_exists($key, self::$registry))
        {
            throw new Exception("No {$key} in application.");
        }

        return self::$registry[$key];
    }

    public static function bind(string $key, $value): void
    {
        static::$registry[$key] = $value;
    }
}
