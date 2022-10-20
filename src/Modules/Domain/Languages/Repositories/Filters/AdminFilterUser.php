<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Repositories\Filters;

use App\Helpers\Pagination\CursorPaginator;

final class AdminFilterUser extends UserLanguageFilter
{
    public function __construct(
        private bool $is_active,
    ) {

    }
}
