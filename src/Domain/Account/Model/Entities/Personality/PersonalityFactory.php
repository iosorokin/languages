<?php

declare(strict_types=1);

namespace Domain\Account\Model\Entities\Personality;

use App\Values\Identificatiors\Id\BigIntIntId;
use App\Values\Identificatiors\Id\StrictNullId;
use App\Values\Personality\Name\NameImp;
use Domain\Account\Dto\NewAccountDto;
use Domain\Account\Dto\RestoreAccountDto;

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
            accountId: BigIntIntId::new($dto->getId()),
            name: NameImp::new($dto->getName()),
        );
    }
}
