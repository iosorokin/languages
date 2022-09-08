<?php

namespace Modules\Personal\Auth\Presenters;

use App\Contracts\Client;
use App\Contracts\Structures\Personal\LearnerStructure;
use Illuminate\Http\Request;
use Modules\Personal\Auth\Services\AuthService;

class GetAuth
{
    public function __construct(
        private AuthService $authService,
    ) {}

    public function __invoke(Request $request): Client
    {
        $auth = $this->authService->getAuth();

        return $auth;
    }


}
