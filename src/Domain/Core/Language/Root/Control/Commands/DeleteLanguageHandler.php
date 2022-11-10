<?php

namespace Domain\Core\Language\Root\Control\Commands;

use App\Model\Roles\ContentManager;
use Domain\Core\Language\Root\Repositories\ManagerLanguageRepository;
use Domain\Core\Languages\Model\Manager\Queries\Mixins\GetLanguage;

class DeleteLanguageHandler
{
    public function __construct(
        private GetLanguage               $getLanguage,
        private ManagerLanguageRepository $repository,
    ) {}

    public function __invoke(ContentManager $manager, RootDeleteLanguage $dto): void
    {
        $language = $this->getLanguage->getOrFail($dto->id());
        $language->delete($this->repository);
    }
}
