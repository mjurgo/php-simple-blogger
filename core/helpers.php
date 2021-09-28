<?php

declare(strict_types=1);

function view(string $name, array $data=[])
{
    $view = $name;

    return require('app/views/layout.view.php');
}

function render(string $name, array $data=[])
{
    extract($data);

    return require("app/views/{$name}.view.php");
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
