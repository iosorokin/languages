<?php

namespace Domain\Root\Core\Language\Control\Queries;

use App\Model\Roles\Root;
use Domain\Root\Core\Language\Model\Collections\RootLanguages;
use Domain\Root\Core\Language\Repository\RootLanguageRepository;

class RootGetLanguagesHandler
{
    public function __construct(
        private RootLanguageRepository $repository,
    ) {}

    public function __invoke(Root $root, RootGetLanguages $query): RootLanguages
    {
        $languages = $this->repository->get($query);

        return $languages;
    }
}
