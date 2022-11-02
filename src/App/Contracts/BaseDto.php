<?php

declare(strict_types=1);

namespace App\Contracts;

abstract class BaseDto
{
    public function toArray(): array
    {
        foreach ($this as $key => $value) {
            $data[$key] = $value;
        }

        return $data ?? [];
    }
}
