<?php

declare(strict_types=1);

namespace WIP\Personal\Account\Model\Aggregates;

use Core\Base\Model\Values\Datetime\Now;
use Core\Base\Model\Values\Datetime\TimestampImp;
use Core\Base\Model\Values\Identificatiors\Id\BigIntId;
use Core\Base\Model\Values\Identificatiors\Id\StrictNullId;
use WIP\Personal\Account\Dto\NewAccountDto;
use WIP\Personal\Account\Dto\RestoreAccountDto;
use WIP\Personal\Account\Model\Entities\Accesses\AccessesFactory;
use WIP\Personal\Account\Model\Entities\BaseAuth\BaseAuthFactory;
use WIP\Personal\Account\Model\Entities\Personality\PersonalityFactory;

final class AccountFactory
{
    public function __construct(
        private PersonalityFactory $personalityFactory,
        private BaseAuthFactory    $baseAuthFactory,
        private AccessesFactory $accessesFactory,
    ) {}

    public function new(NewAccountDto $dto): Account
    {
        $peronal = new Account(
            id: StrictNullId::new(),
            personality: $this->personalityFactory->new($dto),
            baseAuth: $this->baseAuthFactory->new($dto),
            accesses: $this->accessesFactory->new(),
            createdAt: Now::new(),
        );

        return $peronal;
    }

    public function restore(RestoreAccountDto $dto): Account
    {
        $user = new Account(
            id: BigIntId::new($dto->getId()),
            personality: $this->personalityFactory->restore($dto),
            baseAuth: $this->baseAuthFactory->restore($dto),
            accesses: $this->accessesFactory->restore($dto),
            createdAt: TimestampImp::new($dto->getCreatedAt()),
        );

        return $user;
    }
}
