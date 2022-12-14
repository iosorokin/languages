<?php

declare(strict_types=1);

namespace WIP\Personal\Account\Model\Entities\BaseAuth;

use Core\Base\Model\Values\Contacts\Email\UserEmail;
use Core\Base\Model\Values\Identificatiors\Id\BigIntId;
use Core\Base\Model\Values\Identificatiors\Id\StrictNullId;
use WIP\Personal\Account\Dto\NewAccountDto;
use WIP\Personal\Account\Dto\RestoreAccountDto;
use WIP\Personal\Account\Model\Values\Password\BcryptHashedPassword;
use WIP\Personal\Account\Model\Values\Password\RawPassword;

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
