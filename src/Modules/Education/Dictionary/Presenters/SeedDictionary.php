<?php

declare(strict_types=1);

namespace Modules\Education\Dictionary\Presenters;

use Modules\Education\Dictionary\Action\CreateDictionary;
use Modules\Education\Dictionary\Entity\Dictionary;
use Modules\Personal\Auth\Presenters\GetClientPresenter;
use Modules\Personal\User\Entities\User;
use Modules\Personal\User\Presenters\Internal\GetUserPresenter;

final class SeedDictionary
{
    public function __construct(
        private GetUserPresenter $getUser,
        private GetClientPresenter $getClient,
        private CreateDictionary $createDictionary,
    ) {}

    public function __invoke(User|int $user, array $attributes): Dictionary
    {
        $user = is_int($user) ? ($this->getUser)($user) : $user;
        $client = ($this->getClient)($user);
        $dictionary = ($this->createDictionary)($client, $attributes);

        return $dictionary;
    }
}
