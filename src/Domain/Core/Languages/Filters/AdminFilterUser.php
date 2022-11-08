<?php

declare(strict_types=1);

namespace Domain\Core\Languages\Filters;

final class AdminFilterUser
{
    public function __construct(
        private bool $is_active,
    ) {

    }
}
