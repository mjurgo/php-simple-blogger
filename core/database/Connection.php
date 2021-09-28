<?php

declare(strict_types=1);

class Connection
{
    public static function make(array $config): PDO
    {
        try
        {
            return new PDO(
                $config['connection'] . ';dbname=' . $config['name'],
                $config['username'],
                $config['password']
            );
        }
        catch (PDOException $e)
        {
            dd($e->getMessage());
        }
    }
}
