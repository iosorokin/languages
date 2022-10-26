<?php

declare(strict_types=1);

namespace App\Database\Personal;

use App\Database\Personal\Providers\UserDataProvider;
use App\Values\Datetime\CreatedAt;
use App\Values\Datetime\Timestamps;
use App\Values\Datetime\UpdatedAt;
use App\Values\Identificatiors\BigIntId;
use Modules\Personal\Contexts\BaseAuth\Values\BaseAuth;
use Modules\Personal\Entity\User;
use Modules\Personal\Values\Email;
use Modules\Personal\Values\Name;
use Modules\Personal\Values\Password;
use Modules\Personal\Values\Roles;

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
