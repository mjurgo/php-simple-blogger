<?php

declare(strict_types=1);

namespace App\Models;

use PDO;
use Exception;
use App\Core\App;

abstract class BaseModel
{
    private static string $table;

    public static function all(): array
    {
        self::checkTable();
        $table = self::$table;
        
        $statement = App::get('db')->prepare("SELECT * FROM {$table};");
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS, static::class);
    }

    public static function find(int $id)
    {
        self::checkTable();
        $table = self::$table;

        $statement = App::get('db')->prepare(
            "SELECT * FROM {$table} WHERE id = {$id} LIMIT 1;"
        );
        $statement->execute();

        $obj = $statement->fetchObject(static::class);

        if (!$obj)
        {
            throw new Exception('Object not found.');
        }

        return $obj;
    }

    public static function insert($obj)
    {
        self::checkTable();
        $table = self::$table;

        $attributes = array_slice(array_keys(get_class_vars(static::class)), 1);
        $columns = implode(', ', $attributes);
        $parameters = ':' . implode(', :', $attributes);
        $values = array_slice(get_object_vars($obj), 1);
        $sql = "INSERT INTO {$table} ({$columns}) VALUES ({$parameters});";

        try
        {
            $statement = App::get('db')->prepare($sql);
            $statement->execute($values);
        }
        catch (\Throwable $th)
        {
            dump($th);
        }
    }

    private static function checkTable()
    {
        if (!isset(self::$table) || self::$table == '')
        {
            self::$table = str_replace(
                'app\\models\\',
                '',
                strtolower(static::class) . 's'
            );
        }
    }
}
