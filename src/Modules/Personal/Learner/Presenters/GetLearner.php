<?php

declare(strict_types=1);

namespace Modules\Personal\Learner\Presenters;

use App\Contracts\Contexts\Client;
use App\Contracts\Presenters\Personal\Learner\GetLearnerPresenter;
use App\Contracts\Structures\LearnerStructure;
use Modules\Personal\Learner\Repositories\LearnerRepository;

final class GetLearner implements GetLearnerPresenter
{
    public function __construct(
        private LearnerRepository $repository,
    ) {}

    public function __invoke(Client $client, int $id): LearnerStructure
    {
        $learner = $this->repository->getById($id);

        return $learner;
    }
}
