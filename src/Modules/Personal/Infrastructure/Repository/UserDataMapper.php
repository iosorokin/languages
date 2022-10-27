<?php

declare(strict_types=1);

namespace Modules\Personal\Infrastructure\Repository;

use App\Values\Datetime\CreatedAt;
use App\Values\Datetime\Timestamps;
use App\Values\Datetime\UpdatedAt;
use App\Values\Identificatiors\BigIntId;
use Modules\Personal\Domain\Contexts\BaseAuth\Values\BaseAuth;
use Modules\Personal\Domain\Entity\User;
use Modules\Personal\Domain\Values\Email;
use Modules\Personal\Domain\Values\Name;
use Modules\Personal\Domain\Values\Password;
use Modules\Personal\Domain\Values\Roles;
use Modules\Personal\Infrastructure\Repository\Providers\UserDataProvider;

final class UserDataMapper
{
    public static function restore(UserDataProvider $provider): User
    {
        $user = new User();
        $user->setId(new BigIntId($provider->getId()));
        $user->setName(new Name($provider->getName()));
        $user->setRoles(new Roles($provider->getRoles()));
        $user->setTimestamps(new Timestamps(
                new CreatedAt($provider->getCreatedAt()),
                new UpdatedAt($provider->getUpdatedAt()),
            )
        );
        if ($provider->hasBaseAuth()) {
            $user->setBaseAuth(self::restoreBaseAuth($provider));
        }

        return $user;
    }

    private static function restoreBaseAuth(UserDataProvider $provider): BaseAuth
    {
        $baseAuth = new BaseAuth(
            new Email($provider->getEmail()),
            new Password($provider->getPassword()),
        );

        return $baseAuth;
    }
}
