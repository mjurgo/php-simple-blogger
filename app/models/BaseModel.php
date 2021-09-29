<?php

declare(strict_types=1);

namespace App\Models;

use PDO;
use Exception;
use App\Core\App;
use PDOException;

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

    public static function findBy(string $column, int|string $value)
    {
        self::checkTable();
        $table = self::$table;

        $value = is_string($value) ? "'{$value}'" : $value;
        $statement = App::get('db')->prepare(
            "SELECT * FROM {$table} WHERE {$column} = {$value} LIMIT 1;"
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
        catch (PDOException $e)
        {
            dd($e);
        }
    }

    public static function create(array $params)
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

    public static function update(int $id, array $params)
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
            $keys = [];
            foreach (array_keys($params) as $key)
            {
                $keys[] = "{$key} = :{$key}";
            }
            $keys = implode(', ', $keys);
            $sql = "UPDATE {$table} SET {$keys} WHERE id = {$id};";
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
    }

    public static function delete(int $id)
    {
        self::checkTable();
        $table = self::$table;
        $sql = "DELETE FROM {$table} WHERE id = ? LIMIT 1;";
        
        try
        {
            $statement = App::get('db')->prepare($sql);
            $statement->execute([$id]);
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
