<?php

declare(strict_types=1);

namespace Infrastructure\Database\Repositories\Personal;

use App\Values\Contacts\Email\UserEmail;
use App\Values\Datetime\PresetCreatedAt;
use App\Values\Datetime\TimestampImp;
use App\Values\Identificatiors\Id\BigIntIntId;
use App\Values\Personality\Name\NameImp;
use Domain\Personal\Entities\User;
use Domain\Personal\Infrastructure\Repository\PresetTimestamps;
use Domain\Personal\Values\Accesses\UnconfirmUser;
use Domain\Personal\Values\BaseAuth\BaseAuthImp;
use Domain\Personal\Values\BaseAuth\Password\RawPassword;
use Infrastructure\Database\Repositories\Personal\Providers\UserDataProvider;
use ReflectionClass;

final class UserDataMapper
{
    private ReflectionClass $user;

    public function restore(UserDataProvider $provider): User
    {
        $this->user = new ReflectionClass(User::class);
        $this->restoreId($provider->getId());

        $user->setName(new NameImp($provider->getName()));
        $user->setRoles(new UnconfirmUser($provider->getRoles()));
        $user->setTimestamps(new PresetTimestamps(
                new PresetCreatedAt($provider->getCreatedAt()),
                new TimestampImp($provider->getUpdatedAt()),
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

    private function restoreBaseAuth(UserDataProvider $provider): BaseAuthImp
    {
        $baseAuth = new BaseAuthImp(
            new UserEmail($provider->getEmail()),
            new RawPassword($provider->getPassword()),
        );

        return $baseAuth;
    }
}
