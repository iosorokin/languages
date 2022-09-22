<?php

declare(strict_types=1);

namespace App\Tests\Helpers\Personal;

use App\Contracts\Contexts\Client;
use App\Contracts\Presenters\Personal\Learner\GetLearnerPresenter;
use App\Contracts\Presenters\Personal\Learner\RegisterLearnerPresenter;
use App\Contracts\Structures\LearnerStructure;
use Core\Test\Helper;
use Generator;
use Modules\Personal\Learner\Repositories\LearnerRepository;

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
