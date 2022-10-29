<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Application\Filters;

final class AdminFilterUser
{
    public function __construct(
        private bool $is_active,
    ) {

    }
}