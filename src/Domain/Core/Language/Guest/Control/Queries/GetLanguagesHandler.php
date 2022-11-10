<?php

namespace Domain\Core\Language\Guest\Control\Queries;

use App\Model\Roles\Root;
use Domain\Core\Language\Guest\Repository\LanguageRepository;
use Domain\Core\Language\Root\Model\Collections\Languages;

class GetLanguagesHandler
{
    public function __construct(
        private LanguageRepository $repository,
    ) {}

    public function __invoke(Root $root, GetLanguages $query): Languages
    {


        return $languages;
    }
}
