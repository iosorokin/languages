<?php

namespace App\Base\Structures;

use Illuminate\Contracts\Support\Arrayable;

interface Structure extends
    Arrayable
{
    public function fillableAttributes(): array;
}
