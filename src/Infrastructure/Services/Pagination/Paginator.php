<?php

declare(strict_types=1);

namespace Infrastructure\Services\Pagination;

abstract class Paginator
{
    public function toArray(): array
    {
        $data = [];
        foreach ($this as $key => $value) {
            $data[$key] = $value;
        }

        return $data;
    }
}
