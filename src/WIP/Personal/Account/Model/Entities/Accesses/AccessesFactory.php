<?php

declare(strict_types=1);

namespace WIP\Personal\Account\Model\Entities\Accesses;

use Core\Base\Model\Values\Identificatiors\Id\BigIntId;
use Core\Base\Model\Values\Identificatiors\Id\StrictNullId;
use WIP\Personal\Account\Dto\RestoreAccountDto;
use WIP\Personal\Account\Model\Values\Access\DisableAccess;

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
