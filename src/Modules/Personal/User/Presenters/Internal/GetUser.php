<?php

declare(strict_types=1);

namespace Modules\Personal\User\Presenters\Internal;

use Exception;
use Modules\Personal\Auth\Presenters\GetClientPresenter;
use Modules\Personal\User\Structures\User;
use Modules\Personal\User\Repositories\UserRepository;

final class GetUser implements GetUserPresenter
{
    public function __construct(
        private GetClientPresenter $getClient,
        private UserRepository $repository,
    ) {}

    public function __invoke(int $id): ?User
    {
        $client = ($this->getClient)();
        $user = $client->id() === $id ? $client->user() : $this->repository->get($id);

        return $user;
    }

    public function getOrThrowException(int $id): User
    {
        $user = $this->repository->get($id);
        if (! $user) {
            throw new Exception(sprintf('User with id %d not found', $id));
        }

        return $user;
    }
}
