<?php

namespace Domain\Root\Core\Language\Control\Commands;

use App\Model\Roles\Root;
use Domain\Root\Core\Language\Control\Queries\RootFindLanguage;
use Domain\Root\Core\Language\Repository\RootLanguageRepository;
use Domain\Root\Core\Language\Support\RootGetLanguageOrFail;

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
