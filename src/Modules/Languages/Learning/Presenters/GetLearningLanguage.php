<?php

declare(strict_types=1);

namespace Modules\Languages\Learning\Presenters;

use App\Contracts\Contexts\Client;
use App\Contracts\Presenters\Languages\Learning\GetLearningLanguagePresenter;
use App\Contracts\Structures\LearningLanguageStructure;
use Modules\Languages\Learning\Repositories\LearningLanguageRepository;

final class GetLearningLanguage implements GetLearningLanguagePresenter
{
    public function __construct(
        private LearningLanguageRepository $repository,
    ) {}

    public function __invoke(Client $client, int $id): LearningLanguageStructure
    {
        $learningLanguage = $this->repository->getById($id);

        return $learningLanguage;
    }
}
