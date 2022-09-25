<?php

declare(strict_types=1);

namespace Modules\Personal\Learner\Tests;

use App\Contracts\Contexts\Client;
use Core\Test\Helpers\Helper;
use Generator;
use Modules\Personal\Auth\Tests\BaseAuthHelper;
use Modules\Personal\Learner\Presenters\GetLearnerPresenter;
use Modules\Personal\Learner\Presenters\RegisterLearnerPresenter;
use Modules\Personal\Learner\Repositories\LearnerRepository;
use Modules\Personal\Learner\Structures\LearnerStructure;
use Modules\Personal\User\Tests\UserHelper;

final class LearnerHelper extends Helper
{
    public const SEEDED_TEST_LEARNER = [
        'id' => 1,
    ];

    public function __construct(
        private UserHelper     $userHelper,
        private BaseAuthHelper $authHelper,
    ) {}

    public function generateAttributes(): array
    {
        $user = $this->userHelper->generateAttributes();
        $baseAuth = $this->authHelper->generateAttributes();
        $learner = [

        ];

        return $user + $baseAuth + $learner;
    }

    public function create(int $count = 1, array $overwrite = []): Generator
    {
        for ($i = 0; $i < $count; $i++) {
            $presenter = app(RegisterLearnerPresenter::class);
            $attributes = $overwrite + $this->generateAttributes();

            yield $presenter($attributes);
        }
    }

    public function getLearner(Client $client, int $id): LearnerStructure
    {
        $getLearner = app()->make(GetLearnerPresenter::class);

        return $getLearner($client, $id);
    }

    public function getTestLearnerStructure(): LearnerStructure
    {
        $repository = app()->get(LearnerRepository::class);

        return $repository->getById(self::SEEDED_TEST_LEARNER['id']);
    }
}
