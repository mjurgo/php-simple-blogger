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

    public static function insert(array $params)
    {
        self::checkTable();
        $table = self::$table;

        $attributes = array_keys($params);
        $columns = implode(', ', $attributes);
        $parameters = ':' . implode(', :', $attributes);;
        $sql = "INSERT INTO {$table} ({$columns}) VALUES ({$parameters});";

        try
        {
            $statement = App::get('db')->prepare($sql);
            $statement->execute($params);
        }
        catch (\Throwable $th)
        {
            dump($th);
        }
    }

    public static function create($params)
    {
        self::checkTable();
        $table = self::$table;
        $obj = new (static::class);

        if ($obj->allowedProperties)
        {
            foreach ($params as $param => $value)
            {
                if (!in_array($param, $obj->allowedProperties))
                {
                    throw new Exception("Forbidden parameter: {$param}.");
                }
            }
            self::insert($params);
        }
        else
        {
            throw new Exception('Model needs to have allowedProperties array.');
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
