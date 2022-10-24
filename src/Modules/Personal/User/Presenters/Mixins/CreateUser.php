<?php

declare(strict_types=1);

namespace Modules\Personal\User\Presenters\Mixins;

use Illuminate\Support\Facades\DB;
use Modules\Personal\Auth\Factories\BaseAuthFactory;
use Modules\Personal\User\Factories\UserFactory;
use Modules\Personal\User\Model\User;

final class CreateUser
{
    public function __construct(
        private UserFactory        $userFactory,
        private BaseAuthFactory    $baseAuthFactory,
    ) {}

    /**
     * @param array<mixed> $attributes
     */
    public function __invoke(array $attributes): User
    {
        $user = $this->userFactory->create($attributes);
        $baseAuth = $this->baseAuthFactory->create($attributes);

        DB::transaction(function () use ($user, $baseAuth) {
            $user->save();
            $baseAuth->user()->associate($user);
            $baseAuth->save();
        });

        return $user;
    }
}
