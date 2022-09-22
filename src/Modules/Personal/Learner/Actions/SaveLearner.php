<?php

declare(strict_types=1);

namespace Modules\Personal\Learner\Actions;

use Modules\Personal\Learner\Repositories\LearnerRepository;
use Modules\Personal\Learner\Structures\LearnerModel;

final class SaveLearner
{
    public function __construct(
        private LearnerRepository $repository,
    ) {}

    public function __invoke(LearnerModel $learner): void
    {
        $this->repository->add($learner);
    }
}
