<?php

declare(strict_types=1);

namespace App\Extensions;

trait ToArray
{
    public function toArray(): array
    {
        foreach ($this as $key => $value) {
            $data[$key] = $value;
        }

        return $data ?? [];
    }
}
