<?php

declare(strict_types=1);

namespace Domain\Account\Model\Aggregates;

use App\Values\Datetime\Now;
use App\Values\Datetime\TimestampImp;
use App\Values\Identificatiors\Id\BigIntId;
use App\Values\Identificatiors\Id\StrictNullId;
use Domain\Account\Dto\NewAccountDto;
use Domain\Account\Dto\RestoreAccountDto;
use Domain\Account\Model\Entities\Accesses\AccessesFactory;
use Domain\Account\Model\Entities\BaseAuth\BaseAuthFactory;
use Domain\Account\Model\Entities\Personality\PersonalityFactory;

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
