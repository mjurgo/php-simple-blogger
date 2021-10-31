<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\BaseModel;

class Page extends BaseModel
{
  protected array $allowedProperties = ['name', 'body', 'meta_title', 'meta_description', 'in_menu'];
}
