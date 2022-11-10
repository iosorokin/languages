<?php

namespace Domain\Core\Language\Root\Control\Queries;

use App\Model\Roles\ContentManager;
use App\Model\Roles\Root;
use Domain\Core\Language\Root\Model\Collections\RootLanguages;
use Domain\Core\Language\Root\Repositories\RootLanguageRepository;

class RootGetLanguagesHandler
{
    public function __construct(
        private RootLanguageRepository $repository,
    ) {}

    public function __invoke(Root $root, RootGetLanguages $query): RootLanguages
    {


        return $languages;
    }
}
