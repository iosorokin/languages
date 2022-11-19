<?php

declare(strict_types=1);

namespace WIP\Personal\Account\Model\Entities\Personality;

use App\Base\Model\Values\Identificatiors\Id\BigIntId;
use App\Base\Model\Values\Identificatiors\Id\StrictNullId;
use App\Base\Model\Values\Personality\Name\NameImp;
use WIP\Personal\Account\Dto\NewAccountDto;
use WIP\Personal\Account\Dto\RestoreAccountDto;

final class PersonalityFactory
{
    public function new(NewAccountDto $dto): Personality
    {
        return new Personality(
            accountId: StrictNullId::new(),
            name: NameImp::new($dto->getName()),
        );
    }

    public function restore(RestoreAccountDto $dto): Personality
    {
        return new Personality(
            accountId: BigIntId::new($dto->getId()),
            name: NameImp::new($dto->getName()),
        );
    }
}
