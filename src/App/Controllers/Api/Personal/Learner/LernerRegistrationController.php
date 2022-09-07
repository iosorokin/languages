<?php

namespace App\Controllers\Api\Personal\Learner;

use App\Controllers\Controller;
use App\Presenters\Personal\Learner\RegisterLearner;
use Core\Http\Responses\NoContentResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Personal\Guest;

final class LernerRegistrationController extends Controller
{
    public function __construct(
        private RegisterLearner $learnerRegistration,
    ) {}

    public function __invoke(Request $request): Response
    {
        $client = new Guest();
        $learner = ($this->learnerRegistration)($client, $request->all());

        return new NoContentResponse();
    }
}
