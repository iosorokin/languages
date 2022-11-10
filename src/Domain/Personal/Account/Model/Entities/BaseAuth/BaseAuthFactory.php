<?php

declare(strict_types=1);

namespace Domain\Personal\Account\Model\Entities\BaseAuth;

use App\Values\Contacts\Email\UserEmail;
use App\Values\Identificatiors\Id\BigIntId;
use App\Values\Identificatiors\Id\StrictNullId;
use Domain\Personal\Account\Dto\NewAccountDto;
use Domain\Personal\Account\Dto\RestoreAccountDto;
use Domain\Personal\Account\Model\Values\Password\BcryptHashedPassword;
use Domain\Personal\Account\Model\Values\Password\RawPassword;

final class BaseAuthFactory
{
    public function new(NewAccountDto $dto): BaseAuth
    {
        return new BaseAuth(
            accountId: StrictNullId::new(),
            email: UserEmail::new($dto->getEmail()),
            password: RawPassword::newBcryptHashed($dto->getPassword()),
        );
    }

    public function restore(RestoreAccountDto $dto): BaseAuth
    {
        return new BaseAuth(
            accountId: BigIntId::new($dto->getId()),
            email: UserEmail::new($dto->getEmail()),
            password: BcryptHashedPassword::restore($dto->getPassword()),
        );
    }
}