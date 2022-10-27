<?php

declare(strict_types=1);

namespace Modules\Core\Languages\Application\Filters;

final class AdminFilterUser
{
    public function __construct(
        private bool $is_active,
    ) {

    }
}
