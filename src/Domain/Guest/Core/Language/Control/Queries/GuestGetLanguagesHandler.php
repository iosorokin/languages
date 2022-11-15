<?php

namespace Domain\Guest\Core\Language\Control\Queries;

use Domain\Guest\Core\Language\Model\Collection\GuestLanguages;
use Domain\Guest\Core\Language\Repository\GuestLanguageRepository;

class GuestGetLanguagesHandler
{
    public function __construct(
        private GuestLanguageRepository $repository,
    ) {}

    public function __invoke(GuestGetLanguages $query): GuestLanguages
    {


        return $languages;
    }
}
