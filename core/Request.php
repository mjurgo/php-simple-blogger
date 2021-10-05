<?php

declare(strict_types=1);

namespace App\Core;

class Request
{
    private array $get = [];
    private array $post = [];

    public function __construct(array $get, array $post)
    {
        $this->get = $get;
        $this->post = $post;
    }

    public function get(string $param=null, $default=null)
    {
        if ($param)
        {
            return $this->get[$param] ?? $default;
        }

        return $this->get;
    }

    public function post(string $param=null, $default=null)
    {
        if ($param)
        {
            return $this->post[$param] ?? $default;
        }

        return $this->post;
    }
}
