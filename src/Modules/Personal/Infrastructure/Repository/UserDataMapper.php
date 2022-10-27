<?php

declare(strict_types=1);

namespace Modules\Personal\Infrastructure\Repository;

use App\Values\Datetime\PresetCreatedAt;
use App\Values\Datetime\PresetTimestamp;
use App\Values\Identificatiors\BigIntIntId;
use Modules\Personal\Domain\Contexts\User;
use Modules\Personal\Domain\Values\BaseAuth;
use Modules\Personal\Domain\Values\Email;
use Modules\Personal\Domain\Values\Name;
use Modules\Personal\Domain\Values\Password;
use Modules\Personal\Domain\Values\Roles;
use Modules\Personal\Infrastructure\Repository\Providers\UserDataProvider;
use ReflectionClass;

final class UserDataMapper
{
    private ReflectionClass $user;

    public function restore(UserDataProvider $provider): User
    {
        $this->user = new ReflectionClass(User::class);
        $this->restoreId($provider->getId());

        $user->setName(new Name($provider->getName()));
        $user->setRoles(new Roles($provider->getRoles()));
        $user->setTimestamps(new PresetTimestamps(
                new PresetCreatedAt($provider->getCreatedAt()),
                new PresetTimestamp($provider->getUpdatedAt()),
            )
        );
        if ($provider->hasBaseAuth()) {
            $user->setBaseAuth(self::restoreBaseAuth($provider));
        }

        return $user;
    }

    private function restoreId(int $id)
    {
        $ref = (new ReflectionClass(BigIntIntId::class));
        $ref->getProperty('id')
            ->setValue($id);
        $this->user->getProperty('id')
            ->setValue($ref->newInstance());
    }

    private function restoreBaseAuth(UserDataProvider $provider): BaseAuth
    {
        $baseAuth = new BaseAuth(
            new Email($provider->getEmail()),
            new Password($provider->getPassword()),
        );

        return $baseAuth;
    }
}
