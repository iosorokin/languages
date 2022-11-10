<?php

namespace Domain\Core\Language\Root\Control\Queries;

use App\Roles\ContentManager;
use Domain\Core\Language\Root\Model\Collections\RootLanguages;
use Domain\Core\Language\Root\Repositories\ManagerLanguageRepository;

class GetLanguagesHandler
{
    public function __construct(
        private ManagerLanguageRepository $repository,
    ) {}

    public function __invoke(ContentManager $manager, RootGetLanguages $query): RootLanguages
    {


        return $languages;
    }
}
