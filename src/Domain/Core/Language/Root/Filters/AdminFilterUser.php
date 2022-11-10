<?php

declare(strict_types=1);

namespace Domain\Core\Language\Root\Filters;

final class AdminFilterUser
{
    public function __construct(
        private bool $is_active,
    ) {

    }
}
