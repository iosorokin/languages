<?php

declare(strict_types=1);

namespace Core\Infrastructure\Database\Repositories\Eloquent\Personal;

use Core\Base\Model\Values\Contacts\Email\UserEmail;
use Core\Base\Model\Values\Datetime\TimestampImp;
use Core\Base\Model\Values\Identificatiors\Id\BigIntId;
use Core\Base\Model\Values\Personality\Name\NameImp;
use App\Model\Values\Datetime\PresetCreatedAt;
use App\Account\Infrastructure\Repository\PresetTimestamps;
use App\Account\Values\Accesses\UnconfirmUser;
use Core\Infrastructure\Database\Repositories\Eloquent\Personal\Providers\UserDataProvider;
use ReflectionClass;
use WIP\Personal\Account\Model\Aggregates\Account;
use WIP\Personal\Account\Model\Entities\BaseAuth\BaseAuth;
use WIP\Personal\Account\Model\Values\Password\RawPassword;

final class UserDataMapper
{
    private ReflectionClass $user;

    public function restore(UserDataProvider $provider): Account
    {
        $this->user = new ReflectionClass(Account::class);
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
        $ref = (new ReflectionClass(BigIntId::class));
        $ref->getProperty('id')
            ->setValue($id);
        $this->user->getProperty('id')
            ->setValue($ref->newInstance());
    }

    private function restoreBaseAuth(UserDataProvider $provider): BaseAuth
    {
        $baseAuth = new BaseAuth(
            new UserEmail($provider->getEmail()),
            new RawPassword($provider->getPassword()),
        );

        return $baseAuth;
    }
}
