<?php

namespace Domain\Core\Languages\Model\Manager\Commands\Manager;

use App\Roles\ContentManager;
use Domain\Core\Languages\Model\Manager\ManagerLanguageRepository;
use Domain\Core\Languages\Model\Manager\Queries\Mixins\GetLanguage;

class ManagerDeleteLanguageHandler
{
    public function __construct(
        private GetLanguage               $getLanguage,
        private ManagerLanguageRepository $repository,
    ) {}

    public function __invoke(ContentManager $manager, DeleteLanguage $dto): void
    {
        $language = $this->getLanguage->getOrFail($dto->id());
        $language->delete($this->repository);
    }
}
