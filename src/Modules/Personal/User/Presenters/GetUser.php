<?php

declare(strict_types=1);

namespace Modules\Personal\User\Presenters;

use Core\Base\Presenter;
use Modules\Personal\User\Entities\User;
use Modules\Personal\User\Repositories\UserRepository;

final class GetUser extends Presenter implements GetUserPresenter
{
    public function __construct(
        private UserRepository $repository,
    ) {}

    public function __invoke(int $id): User
    {
        $client = $this->client();
        $user = $client->id() === $id ? $client : $this->repository->get($id);

        return $user;
    }
}
