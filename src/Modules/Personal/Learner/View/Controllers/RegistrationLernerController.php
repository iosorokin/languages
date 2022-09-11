<?php

namespace Modules\Personal\Learner\View\Controllers;

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
        $learner = ($this->learnerRegistration)($request->all());

        return new NoContentResponse();
    }
}
