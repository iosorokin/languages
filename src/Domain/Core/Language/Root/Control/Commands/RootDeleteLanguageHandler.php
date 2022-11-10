<?php

namespace Domain\Core\Language\Root\Control\Commands;

use App\Model\Roles\Root;
use Domain\Core\Language\Root\Repositories\RootLanguageRepository;
use Domain\Core\Language\Root\Support\RootGetLanguageOrFail;

class RootDeleteLanguageHandler
{
    public function __construct(
        private RootLanguageRepository $repository,
        private RootGetLanguageOrFail $getLanguageOrFail,
    ) {}

    public function __invoke(Root $root, RootDeleteLanguage $command): void
    {
        $language = ($this->getLanguageOrFail)($command->id());
        $language->delete($this->repository);
    }
}
