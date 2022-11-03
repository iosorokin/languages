<?php

declare(strict_types=1);

namespace Domain\Personal\Entities;

use App\Values\Contacts\Email\UserEmail;
use App\Values\Datetime\DefaultTimestamps;
use App\Values\Datetime\StrictNullTimestamp;
use App\Values\Datetime\TimestampImp;
use App\Values\Identificatiors\Id\BigIntIntId;
use App\Values\Identificatiors\Id\StrictNullId;
use App\Values\Personality\Name\NameImp;
use Domain\Personal\Dto\NewUserDto;
use Domain\Personal\Dto\RestoreUserDto;
use Domain\Personal\Policies\CanAssignAsRoot;
use Domain\Personal\Values\Accesses\AccessesImp;
use Domain\Personal\Values\BaseAuth\BaseAuthImp;
use Domain\Personal\Values\BaseAuth\Password\BcryptHashedPassword;
use Domain\Personal\Values\BaseAuth\Password\RawPassword;
use Domain\Personal\Values\Personality\PersonalityImp;

final class UserFactory
{
    public function __construct(
        private CanAssignAsRoot $accessPolicy,
    ) {}

    public function register(NewUserDto $dto): User
    {
        $peronal = new User(
            id: StrictNullId::new(),
            personality: PersonalityImp::new(
                NameImp::new($dto->getName())
            ),
            accesses: AccessesImp::new([], $this->accessPolicy),
            baseAuth: BaseAuthImp::new(
                UserEmail::new($dto->getEmail()),
                RawPassword::newHashed($dto->getPassword())
            ),
            timestamps: DefaultTimestamps::new(
                createdAt: StrictNullTimestamp::new(),
                updatedAt: StrictNullTimestamp::new(),
            )
        );

        return $peronal;
    }

    public function restore(RestoreUserDto $dto): User
    {
        $user = new User(
            id: BigIntIntId::new($dto->getId()),
            personality: PersonalityImp::new(
                NameImp::new($dto->getName()),
            ),
            accesses: AccessesImp::new($dto->getAccesses()),
            baseAuth: BaseAuthImp::new(
                UserEmail::new($dto->getEmail()),
                BcryptHashedPassword::restore($dto->getPassword()),
            ),
            timestamps: DefaultTimestamps::new(
                TimestampImp::new($dto->getCreatedAt()),
                TimestampImp::new($dto->getUpdatedAt()),
            )
        );

        return $user;
    }
}
