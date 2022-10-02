<?php

declare(strict_types=1);

namespace Modules\Personal\User\Policy;

interface AdminUserPolicy
{
    public function canCreate(): void;
}
