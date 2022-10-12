<?php

declare(strict_types=1);

namespace Modules\Personal\Auth\Presenters\Base;

use Modules\Personal\Auth\Actions\GetBaseAuth;
use Modules\Personal\Auth\Dto\GetBaseAuthDto;
use Modules\Personal\Auth\Services\AuthService;
use Modules\Personal\Auth\Validators\LoginValidator;
use Modules\Personal\User\Structures\User;
use Modules\Personal\User\Repositories\UserRepository;
use Webmozart\Assert\Assert;

final class BaseLogin implements BaseLoginPresenter
{
    public function __construct(
        private LoginValidator $validator,
        private GetBaseAuth    $getBaseAuth,
        private UserRepository $userRepository,
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
        $baseAuthDto = GetBaseAuthDto::new($attributes);
        $baseAuth = ($this->getBaseAuth)($baseAuthDto);
        $user = $this->userRepository->get($baseAuth->getUser()->getId());
        Assert::notNull($user);

        return $user;
    }

    private function creatApiToken(User $user): string
    {
        return $this->authService->login($user);
    }
}
