<?php

namespace Domain\Core\Language\Guest\Control\Queries;

use Domain\Core\Language\Guest\Model\Collection\GuestLanguages;
use Domain\Core\Language\Guest\Repository\GuestLanguageRepository;

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
