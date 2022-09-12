<?php

namespace Modules\Personal\Learner\Controllers\Api;

use App\Base\Controller;
use Core\Http\Responses\NoContentResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Personal\Learner\Presenters\RegisterLearner;

final class RegistrationLernerController extends Controller
{
    public function __construct(
        private RegisterLearner $learnerRegistration,
    ) {}

    public function __invoke(Request $request): Response
    {
        $client = $this->client();
        $learner = ($this->learnerRegistration)($client, $request->all());

        return new NoContentResponse();
    }
}
