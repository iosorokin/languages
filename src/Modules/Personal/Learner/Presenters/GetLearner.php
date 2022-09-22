<?php

declare(strict_types=1);

namespace Modules\Personal\Learner\Presenters;

use App\Contracts\Contexts\Client;
use Modules\Personal\Learner\Repositories\LearnerRepository;
use Modules\Personal\Learner\Structures\LearnerStructure;

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
