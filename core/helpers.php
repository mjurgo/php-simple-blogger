<?php

declare(strict_types=1);

use App\Core\Auth;

function view(string $name, array $data=[])
{
    $view = $name;

    return require('app/views/layout.view.php');
}

function render(string $name, array $data=[])
{
    $clearData = escape($data);
    extract($clearData);

    return require("app/views/{$name}.view.php");
}

function redirect(string $path, string $message='')
{
    if ($message)
    {
        $_SESSION['flash_message'] = $message;
    }

    header("Location: {$path}");
    exit();
}

function get_flash_message(): string
    {
        $msg = $_SESSION['flash_message'];
        unset($_SESSION['flash_message']);
        
        return $msg;
    }

function flash_message(): bool
{
    return isset($_SESSION['flash_message']);
}

function escape(array $params): array
{
    $clearParams = [];

    foreach($params as $key => $param)
    {
        if (is_array($param))
        {
            $clearParams[$key] = escape($param);
        }
        elseif (is_object($param))
        {
            $attrs = escape(get_object_vars($param));
            $obj = new (get_class($param));
            foreach ($attrs as $attr => $value)
            {
                $obj->$attr = $value;
            }
            $clearParams[$key] = $obj;
        }
        elseif ($param)
        {
            $clearParams[$key] = htmlentities($param);
        }
        else
        {
            $clearParams[$key] = $param;
        }
    }

    return $clearParams;
}

function loggedIn()
{
    return isset($_SESSION['auth']);
}

function isAdmin()
{
    return Auth::isAdmin();
}

function dump($var): void
{
    echo '</br><div 
    style=
        "display: inline-block;
        padding: 0 10px;
        border: 1px dashed gray;
        background: lightgray;">
    <pre>';
    print_r($var);
    echo '</pre>
    </div>
    </br>';
}

function dd($var): void
{
    echo '</br><div 
    style=
        "display: inline-block;
        padding: 0 10px;
        border: 1px dashed gray;
        background: lightgray;">
    <pre>';
    print_r($var);
    echo '</pre>
    </div>
    </br>';
    exit;
}
