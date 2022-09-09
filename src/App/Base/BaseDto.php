<?php

declare(strict_types=1);

namespace App\Base;

use Illuminate\Contracts\Support\Arrayable;

abstract class BaseDto implements Dto, Arrayable
{
    /**
     * @return array<mixed>
     */
    public function toArray(): array
    {
        foreach ($this as $property => $value) {
            $attributes[$property] = $value;
        }

        return $attributes ?? [];
    }
}
