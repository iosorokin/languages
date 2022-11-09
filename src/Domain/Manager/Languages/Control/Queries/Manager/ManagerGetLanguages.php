<?php

namespace Domain\Core\Languages\Model\Manager\Queries\Manager;

use App\Roles\ContentManager;
use Domain\Core\Languages\Model\Manager\Collections\Languages;
use Domain\Core\Languages\Model\Manager\ManagerLanguageRepository;
use Domain\Core\Languages\Model\Manager\Queries\GetLanguages;

class ManagerGetLanguages
{
    public function __construct(
        private ManagerLanguageRepository $repository,
    ) {}

    public function __invoke(ContentManager $manager, GetLanguages $query): Languages
    {


        return $languages;
    }
}
