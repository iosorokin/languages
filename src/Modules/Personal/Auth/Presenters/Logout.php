<?php

declare(strict_types=1);

namespace Modules\Personal\Auth\Presenters;

use App\Contracts\Contexts\Client;
use Core\Base\Presenter;
use Modules\Personal\Auth\Services\AuthService;

final class Logout extends Presenter implements LogoutPresenter
{
    public function __construct(
        private AuthService $authService,
    ) {}

    public function __invoke(Client $client)
    {
        $this->authService->logout($client->user());
    }
}
