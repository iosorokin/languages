<?php

declare(strict_types=1);

namespace Domain\Personal\Account\Model\Entities\Accesses\Policies;

final class FreeDisableAccessPolicy implements DisableAccessPolicy
{
    public function __invoke(): void
    {
        //
    }
}
