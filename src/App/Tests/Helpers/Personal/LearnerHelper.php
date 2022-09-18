<?php

declare(strict_types=1);

namespace App\Tests\Helpers\Personal;

use App\Contracts\Presenters\Personal\Learner\RegisterLearnerPresenter;
use Core\Test\Helper;
use Generator;
use Illuminate\Support\Arr;

final class LearnerHelper extends Helper
{
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
}
