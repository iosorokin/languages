<?php

declare(strict_types=1);

namespace Modules\Personal\Auth\Presenters\Login;

use App\Contracts\Presenters\Personal\Auth\LearnerBaseLoginPresenter;
use App\Contracts\Structures\Personal\LearnerStructure;
use Modules\Personal\Auth\Actions\GetBaseAuth;
use Modules\Personal\Auth\Dto\GetBaseAuthDto;
use Modules\Personal\Auth\Services\AuthService;
use Modules\Personal\Auth\Validators\BaseAuthValidator;
use Modules\Personal\Learner\Repositories\LearnerRepository;
use Modules\Personal\Learner\Structures\LearnerModel;
use Webmozart\Assert\Assert;

final class LearnerBaseLogin implements LearnerBaseLoginPresenter
{
    public function __construct(
        private BaseAuthValidator $validator,
        private GetBaseAuth $getBaseAuth,
        private LearnerRepository $learnerRepository,
        private AuthService $authService,
    ) {}

    public function __invoke(array $attributes): ?string
    {
        $attributes = $this->validator->validate($attributes);
        $learner = $this->getLearner($attributes);

        return $this->creatApiToken($learner);
    }

    private function getLearner(array $attributes): LearnerStructure
    {
        $baseAuthDto = GetBaseAuthDto::new($attributes);
        $baseAuth = ($this->getBaseAuth)($baseAuthDto);
        Assert::same($baseAuth->authable_type, LearnerModel::class);
        $learner = $this->learnerRepository->getById($baseAuth->authable_id);
        Assert::notNull($learner);

        return $learner;
    }

    private function creatApiToken(LearnerStructure $learner): string
    {
        return $this->authService->auth($learner);
    }
}
