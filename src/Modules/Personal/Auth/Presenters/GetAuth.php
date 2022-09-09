<?php

namespace Modules\Personal\Auth\Presenters;

use App\Contracts\Structures\AuthableStructure;
use Illuminate\Http\Request;
use Modules\Personal\Auth\Services\AuthService;

class GetAuth
{
    public function __construct(
        private AuthService $authService,
    ) {}

    public function __invoke(Request $request): ?AuthableStructure
    {
        $auth = $this->authService->getAuth();

        return $auth;
    }
}
