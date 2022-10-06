<?php

namespace Modules\Domain\Languages\Filters;

use App\Helpers\Pagination\CursorPaginator;
use Illuminate\Support\Arr;

class RealLanguageFilter
{
    public function __construct(
        public readonly CursorPaginator $paginator,
        public readonly ?string $name,
        public readonly ?string $nativeName,
        public readonly ?string $code,
    ) {}

    public static function new(array $attributes): self
    {
        return new self(
            paginator: CursorPaginator::new($attributes),
            name: Arr::get($attributes, 'name'),
            nativeName: Arr::get($attributes, 'nativeName'),
            code: Arr::get($attributes, 'code'),
        );
    }
}
