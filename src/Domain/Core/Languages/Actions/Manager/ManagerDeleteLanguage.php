<?php

namespace Domain\Core\Languages\Actions\Manager;

use App\Roles\ContentManager;
use App\Values\Identificatiors\Id\BigIntId;
use Domain\Core\Languages\Queries\Mixins\GetLanguage;
use Domain\Core\Languages\Repositories\LanguageRepository;

class ManagerDeleteLanguage
{
    public function __construct(
        private GetLanguage $getLanguage,
        private LanguageRepository $repository,
    ) {}

    public function __invoke(ContentManager $manager, int $languageId): void
    {
        $languageId = BigIntId::new($languageId);
        $language = $this->getLanguage->getOrFail($languageId);
        $language->delete($this->repository);
    }
}
