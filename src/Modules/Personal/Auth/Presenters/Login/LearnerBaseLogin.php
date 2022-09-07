<?php

namespace Modules\Personal\Auth\Presenters\Login;

use App\Contracts\Presenters\Personal\Auth\LearnerBaseLoginPresenter;
use App\Contracts\Structures\Personal\LearnerStructure;
use Illuminate\Support\Arr;
use Modules\Personal\Auth\Actions\GetBaseAuth;
use Modules\Personal\Auth\Dto\AuthDto;
use Modules\Personal\Auth\Dto\GetBaseAuthDto;
use Modules\Personal\Auth\Services\AuthService;
use Modules\Personal\Learner\Repositories\LearnerRepository;
use Modules\Personal\Learner\Structures\LearnerModel;
use Webmozart\Assert\Assert;

class LearnerBaseLogin implements LearnerBaseLoginPresenter
{
    public function __construct(
        private GetBaseAuth $getBaseAuth,
        private LearnerRepository $learnerRepository,
        private AuthService $authService,
    ) {}

    public function __invoke(array $attributes): ?string
    {
        // проверить наличие пользователя
        // проверить пароль
        // достать агрегат пользователя
        $learner = $this->getLearner($attributes);

        return $this->creatApiToken($learner);
    }

    private function getLearner(array $attributes): LearnerStructure
    {
        $baseAuthDto = new GetBaseAuthDto(
            email: Arr::get($attributes, 'email'),
            password: Arr::get($attributes, 'password'),
        );
        $baseAuth = ($this->getBaseAuth)($baseAuthDto);
        Assert::same($baseAuth->authable_type, LearnerModel::class);
        $learner = $this->learnerRepository->getById($baseAuth->authable_id);
        Assert::notNull($learner);

        return $learner;
    }

    private function creatApiToken(LearnerStructure $learner): string
    {
        $modelAuthDto = new AuthDto(
            authable: $learner,
        );

        return $this->authService->auth($modelAuthDto);
    }
}
