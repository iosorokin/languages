<?php

declare(strict_types=1);

namespace Modules\Personal\Auth\Presenters;

use Modules\Personal\Auth\Contexts\Client;
use Modules\Personal\Auth\Services\AuthService;

final class Logout implements LogoutPresenter
{
    public function __construct(
        private AuthService $authService,
    ) {}

    public function __invoke(Client $client)
    {
        $this->authService->logout($client->user());
    }
}
