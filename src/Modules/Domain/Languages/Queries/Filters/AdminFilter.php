<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Queries\Filters;

use App\Helpers\Pagination\CursorPaginator;

final class AdminFilter extends LanguageFilter
{
    public function __construct(
        private bool $is_active,
        CursorPaginator $paginator,
        ?string $name,
        ?string $nativeName,
        ?string $code
    ) {
        parent::__construct($paginator, $name, $nativeName, $code);
    }
}
