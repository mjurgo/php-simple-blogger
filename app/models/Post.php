<?php

declare(strict_types=1);

namespace App\Models;

class Post extends BaseModel
{
    protected array $allowedProperties = ['title', 'body', 'meta_title',
        'meta_description'];
}
