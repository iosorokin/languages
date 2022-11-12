<?php

namespace Domain\Core\Language\Root\Control\Commands;

use App\Model\Roles\Root;
use Domain\Core\Language\Root\Control\Queries\RootFindLanguage;
use Domain\Core\Language\Root\Repository\RootLanguageRepository;
use Domain\Core\Language\Root\Support\RootGetLanguageOrFail;

class RootDeleteLanguageHandler
{
    public function __construct(
        private RootLanguageRepository $repository,
        private RootGetLanguageOrFail  $getLanguageOrFail,
    ) {}

    public function __invoke(Root $root, RootDeleteLanguage $command): void
    {
        $query = new RootFindLanguage($command->id());
        $language = ($this->getLanguageOrFail)($query);
        $language->delete($this->repository);
    }
}
