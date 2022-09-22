<?php

declare(strict_types=1);

namespace Modules\Languages\Learning\Presenters;

use App\Contracts\Contexts\Client;
use Modules\Languages\Learning\Repositories\LearningLanguageRepository;
use Modules\Languages\Learning\Structures\LearningLanguageStructure;

final class GetLearningLanguage implements GetLearningLanguagePresenter
{
    public function __construct(
        private LearningLanguageRepository $repository,
    ) {}

    public function __invoke(int $id): LearningLanguageStructure
    {
        $learningLanguage = $this->repository->getById($id);

        return $learningLanguage;
    }
}
