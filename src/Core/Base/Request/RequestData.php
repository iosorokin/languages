<?php

namespace Core\Base\Request;

use Illuminate\Contracts\Support\Arrayable;

interface RequestData extends Arrayable
{
    public function get(string $key, mixed $default): mixed;

    public function has(string $key): bool;
}
