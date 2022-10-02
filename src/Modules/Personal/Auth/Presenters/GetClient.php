<?php

declare(strict_types=1);

namespace Modules\Personal\Auth\Presenters;

use App\Contracts\Contexts\Client;
use Core\Base\Presenter;
use Modules\Personal\Auth\Contexts\ClientContext;
use Modules\Personal\Auth\Services\AuthService;

final class GetClient extends Presenter implements GetClientPresenter
{
    public static Client $client;

    public function __construct(
        private AuthService $authService,
    ) {}

    public function __invoke(): Client
    {
        $auth = $this->authService->getAuth();
        self::$client = self::$client ?? new ClientContext($auth);

        return self::$client;
    }
}
