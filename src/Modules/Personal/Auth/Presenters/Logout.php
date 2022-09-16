<?php

namespace Modules\Personal\Auth\Presenters;

use App\Contracts\Contexts\Client;
use App\Contracts\Presenters\Personal\Auth\LogoutPresenter;
use Modules\Personal\Auth\Services\AuthService;

class Logout implements LogoutPresenter
{
    public function __construct(
        private AuthService $authService,
    ) {}

    public function __invoke(Client $client)
    {
        $this->authService->logout($client->getStructure());
    }
}
