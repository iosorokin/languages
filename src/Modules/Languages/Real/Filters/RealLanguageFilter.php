<?php

namespace Modules\Languages\Real\Filters;

use App\Helpers\Pagination\CursorPaginator;

class RealLanguageFilter
{
    public function __construct(
        public readonly CursorPaginator $paginator,
        public readonly ?string $name,
        public readonly ?string $nativeName,
        public readonly ?string $code,
    ) {}
}
