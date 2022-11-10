<?php

namespace App\Support\Pagination;

use Illuminate\Support\Arr;

class CursorPaginator
{
    public function __construct(
        public readonly ?int $from,
        public readonly ?int $limit,
    ) {}

    public static function new(array $attributes): self
    {
        return new self(
            from: Arr::get($attributes, 'from'),
            limit: Arr::get($attributes, 'limit'),
        );
    }
}
