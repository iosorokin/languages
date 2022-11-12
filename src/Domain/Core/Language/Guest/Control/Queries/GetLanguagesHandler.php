<?php

namespace Domain\Core\Language\Guest\Control\Queries;

use Domain\Core\Language\Guest\Model\Collection\Languages;
use Domain\Core\Language\Guest\Repository\LanguageRepository;

class GetLanguagesHandler
{
    public function __construct(
        private LanguageRepository $repository,
    ) {}

    public function __invoke(GetLanguages $query): Languages
    {


        return $languages;
    }
}
