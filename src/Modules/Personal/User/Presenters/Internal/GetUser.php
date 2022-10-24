<?php

declare(strict_types=1);

namespace Modules\Personal\User\Presenters\Internal;

use Exception;
use Illuminate\Validation\ValidationException;
use Modules\Personal\Auth\Presenters\Internal\GetAuthUser;
use Modules\Personal\User\Model\User;

final class GetUser
{
    public function __construct(
        private GetAuthUser $getAuthUser,
    ) {}

    public function get(int $id): ?User
    {
        $auth = ($this->getAuthUser)();
        $user = $auth->id === $id ? $auth : User::find($id);

        return $user;
    }

    public function getOrThrowNotFound(int $id): User
    {
        $user = $this->get($id);
        abort_if(! $user, 404);

        return $user;
    }

    public function getOrThrowBadRequest(int $id): User
    {
        $user = $this->get($id);
        if (! $user) {
            throw ValidationException::withMessages([
                'user_id' => sprintf('User with id %d not found', $id),
            ]);
        }

        return $user;
    }

    public function getOrThrowException(int $id): User
    {
        $user = $this->get($id);
        if (! $user) {
            throw new Exception(
                sprintf('User with id %d not found', $id)
            );
        }

        return $user;
    }
}
