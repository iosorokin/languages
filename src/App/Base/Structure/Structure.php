<?php

namespace App\Base\Structure;

use Illuminate\Contracts\Support\Arrayable;

interface Structure extends
    Arrayable
{
    public function fillableAttributes(): array;
}
