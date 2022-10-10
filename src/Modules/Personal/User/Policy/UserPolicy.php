<?php

declare(strict_types=1);

namespace Modules\Personal\User\Policy;

interface UserPolicy
{
    public function canCreate(): void;
}
