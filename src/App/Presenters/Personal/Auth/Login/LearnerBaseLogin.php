<?php

namespace App\Presenters\Personal\Auth\Login;

use App\Repositories\Personal\Learner\LearnerRepository;
use Illuminate\Support\Arr;
use Modules\Personal\Auth\Actions\Auth;
use Modules\Personal\Auth\Actions\Base\GetBaseAuth;
use Modules\Personal\Auth\Dto\GetBaseAuthDto;
use Modules\Personal\Learner\Structures\LearnerModel;
use Webmozart\Assert\Assert;

class LearnerBaseLogin
{
    public function __construct(
        private GetBaseAuth $getBaseAuth,
        private LearnerRepository $learnerRepository,
        private Auth $auth,
    ) {}

    public function __invoke(array $attributes): ?string
    {
        // проверить наличие пользователя
        // проверить пароль
        // достать агрегат пользователя
        $baseAuthDto = new GetBaseAuthDto(
            email: Arr::get($attributes, 'email'),
            password: Arr::get($attributes, 'password'),
        );
        $baseAuth = ($this->getBaseAuth)($baseAuthDto);
        Assert::same($baseAuth->authable_type, LearnerModel::class);
        $learner = $this->learnerRepository->getById($baseAuth->authable_id);
        Assert::notNull($learner);

        return ($this->auth)($learner);
    }
}
