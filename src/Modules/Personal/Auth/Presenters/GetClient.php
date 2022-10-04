<?php

declare(strict_types=1);

namespace Modules\Personal\Auth\Presenters;

use Modules\Personal\Auth\Contexts\Client;
use Modules\Personal\Auth\Contexts\ClientContext;
use Modules\Personal\Auth\Services\AuthService;
use Modules\Personal\User\Entities\User;

final class GetClient implements GetClientPresenter
{
    public function __construct(
        private AuthService $authService,
    ) {}

    public function __invoke(?User $user = null): Client
    {
        $user = $user ?? $this->authService->getAuth();

        return new ClientContext($user);
    }
}
