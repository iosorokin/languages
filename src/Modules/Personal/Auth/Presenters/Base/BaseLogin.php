<?php

declare(strict_types=1);

namespace Modules\Personal\Auth\Presenters\Base;

use Modules\Personal\Auth\Presenters\Internal\GetBaseAuth;
use Modules\Personal\Auth\Services\AuthService;
use Modules\Personal\Auth\Validators\LoginValidator;
use Modules\Personal\User\Model\User;
use Webmozart\Assert\Assert;

final class BaseLogin
{
    public function __construct(
        private LoginValidator $validator,
        private GetBaseAuth    $getBaseAuth,
        private AuthService    $authService,
    ) {}

    public function __invoke(array $attributes): ?string
    {
        $attributes = $this->validator->validate($attributes);
        $user = $this->getUser($attributes);

        return $this->creatApiToken($user);
    }

    private function getUser(array $attributes): User
    {
        $baseAuth = ($this->getBaseAuth)($attributes);
        $user = $baseAuth->user;
        Assert::notNull($user);

        return $user;
    }

    private function creatApiToken(User $user): string
    {
        return $this->authService->login($user);
    }
}
