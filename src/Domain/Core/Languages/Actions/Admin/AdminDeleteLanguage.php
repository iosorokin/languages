<?php

namespace Domain\Core\Languages\Actions\Admin;

use App\Repositories\Eloquent\Language\LanguageRepository;
use App\Values\Identificatiors\Id\BigIntId;
use Domain\Core\Languages\Queries\GetLanguage;
use Domain\Support\Authorization\Manager;

class AdminDeleteLanguage
{
    public function __construct(
        private GetLanguage $getLanguage,
        private LanguageRepository $repository,
    ) {}

    public function __invoke(Manager $manager, int $languageId): void
    {
        $languageId = BigIntId::new($languageId);
        $language = $this->getLanguage->getOrThrowBadRequest($languageId);
        $language->delete($this->repository);
    }
}
