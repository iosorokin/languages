<?php

declare(strict_types=1);

namespace Domain\Personal\Account\Model\Entities\Personality;

use App\Model\Values\Identificatiors\Id\BigIntId;
use App\Model\Values\Identificatiors\Id\StrictNullId;
use App\Model\Values\Personality\Name\NameImp;
use Domain\Personal\Account\Dto\NewAccountDto;
use Domain\Personal\Account\Dto\RestoreAccountDto;

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
