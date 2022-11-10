<?php

namespace Domain\Core\Language\Student\Control\Queries;

use App\Model\Roles\ContentManager;
use App\Model\Roles\Root;
use Domain\Core\Language\Root\Model\Collections\Languages;
use Domain\Core\Language\Root\Repositories\LanguageRepository;

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
