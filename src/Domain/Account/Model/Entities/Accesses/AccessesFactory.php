<?php

declare(strict_types=1);

namespace Domain\Account\Model\Entities\Accesses;

use App\Values\Identificatiors\Id\BigIntId;
use App\Values\Identificatiors\Id\StrictNullId;
use Domain\Account\Dto\RestoreAccountDto;
use Domain\Account\Model\Values\Access\DisableAccess;

final class AccessesFactory
{
    public function new(): Accesses
    {
        return new Accesses(
            accountId: StrictNullId::new(),
            student: DisableAccess::new(),
            root: DisableAccess::new(),
        );
    }

    public function restore(RestoreAccountDto $dto): Accesses
    {
        return new Accesses(
            accountId: BigIntId::new($dto->getId()),
            student: DisableAccess::new(),
            root: DisableAccess::new(),
        );
    }
}
