<?php

declare(strict_types=1);

namespace WIP\Personal\Account\Queries;

use App\Controllers\Auth\Internal\GetAuthUser;
use Exception;
use Illuminate\Validation\ValidationException;
use Core\Infrastructure\Database\Repositories\Eloquent\Personal\Eloquent\EloquentUserModel;

final class GetUser
{
    public function __construct(
        private GetAuthUser $getAuthUser,
    ) {}

    public function get(int $id): ?EloquentUserModel
    {
        $auth = ($this->getAuthUser)();
        $user = $auth->id === $id ? $auth : EloquentUserModel::find($id);

        return $user;
    }

    public function getOrThrowNotFound(int $id): EloquentUserModel
    {
        $user = $this->get($id);
        abort_if(! $user, 404);

        return $user;
    }

    public function getOrThrowBadRequest(int $id): EloquentUserModel
    {
        $user = $this->get($id);
        if (! $user) {
            throw ValidationException::withMessages([
                'user_id' => sprintf('User with id %d not found', $id),
            ]);
        }

        return $user;
    }

    public function getOrThrowException(int $id): EloquentUserModel
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
