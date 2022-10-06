<?php

declare(strict_types=1);

namespace Modules\Core\Sources\Presenters;

use Modules\Core\Sources\Actions\CreateSource;
use Modules\Core\Sources\Entities\Source;
use Modules\Personal\Auth\Presenters\GetClientPresenter;
use Modules\Personal\User\Entities\User;
use Modules\Personal\User\Repositories\UserRepository;

final class SeedSource
{
    public function __construct(
        private GetClientPresenter $getClient,
        private CreateSource $createSource,
        private UserRepository $userRepository,
    ) {}

    public function __invoke(User|int $user, array $attributes): Source
    {
        $user = is_int($user) ? $this->userRepository->get($user) : $user;
        $client = ($this->getClient)($user);
        $source = ($this->createSource)($client, $attributes);

        return $source;
    }
}
