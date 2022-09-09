<?php

declare(strict_types=1);

namespace Modules\Personal\Learner\Presenters;

use App\Contracts\Presenters\Personal\Learner\SaveLearnerPresenter;
use App\Contracts\Structures\Personal\LearnerStructure;
use Modules\Personal\Learner\Repositories\LearnerRepository;

final class SaveLearner implements SaveLearnerPresenter
{
    public function __construct(
        private LearnerRepository $repository,
    ) {}

    public function __invoke(LearnerStructure $learner): void
    {
        $this->repository->add($learner);
    }
}
