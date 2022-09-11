<?php

declare(strict_types=1);

namespace Modules\Personal\Auth\Presenters;

use App\Contracts\Contexts\Client;
use App\Contracts\Presenters\Personal\Auth\GetClientPresenter;
use Modules\Personal\Auth\Contexts\ClientContext;
use Modules\Personal\Auth\Services\AuthService;

class GetClient implements GetClientPresenter
{
    public function __construct(
        private AuthService $authService,
    ) {}

    public function __invoke(): Client
    {
        $auth = $this->authService->getAuth();
        $client = new ClientContext($auth);

        return $client;
    }
}