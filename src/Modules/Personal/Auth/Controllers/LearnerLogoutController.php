<?php

namespace Modules\Personal\Auth\Controllers;

use Core\Http\Controller;
use Core\Http\Responses\Json\NoContentResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Personal\Auth\Presenters\Logout;

class LearnerLogoutController extends Controller
{
    public function __construct(
        private Logout $logout,
    ) {}

    public function __invoke(Request $request): JsonResponse
    {
        $client = $this->client();
        ($this->logout)($client);

        return new NoContentResponse();
    }
}
