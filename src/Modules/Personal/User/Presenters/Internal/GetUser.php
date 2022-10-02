<?php

declare(strict_types=1);

namespace Modules\Personal\User\Presenters\Internal;

use Modules\Personal\Auth\Presenters\GetClientPresenter;
use Modules\Personal\User\Entities\User;
use Modules\Personal\User\Repositories\UserRepository;

final class GetUser implements GetUserPresenter
{
    public function __construct(
        private GetClientPresenter $getClient,
        private UserRepository $repository,
    ) {}

    public function __invoke(int $id): User
    {
        $client = ($this->getClient)();
        $user = $client->id() === $id ? $client : $this->repository->get($id);

        return $user;
    }
}
