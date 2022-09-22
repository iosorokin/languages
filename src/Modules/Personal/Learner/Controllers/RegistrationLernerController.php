<?php

namespace Modules\Personal\Learner\Controllers;

use Core\Http\Controller;
use Core\Http\Responses\Json\CreatedResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Personal\Learner\Presenters\RegisterLearner;

final class RegistrationLernerController extends Controller
{
    public function __construct(
        private RegisterLearner $learnerRegistration,
    ) {}

    public function __invoke(Request $request): JsonResponse
    {
        $learner = ($this->learnerRegistration)($request->all());
        $location = route('api.learners.show', ['id' => $learner->id]);

        return new CreatedResponse($location);
    }
}
