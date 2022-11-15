<?php

declare(strict_types=1);

namespace Domain\Guest\Core\Language;

use Domain\Guest\Core\Language\Control\Queries\GuestFindLanguage;
use Domain\Guest\Core\Language\Control\Queries\GuestFindLanguageHandler;
use Domain\Guest\Core\Language\Control\Queries\GuestGetLanguages;
use Domain\Guest\Core\Language\Control\Queries\GuestGetLanguagesHandler;
use Domain\Guest\Core\Language\Model\Aggregate\GuestLanguage;
use Domain\Guest\Core\Language\Model\Collection\GuestLanguages;

final class GuestLanguageModuleProd implements GuestLanguageModule
{
    public function find(GuestFindLanguage $query): GuestLanguage
    {
        /** @var GuestFindLanguageHandler $action */
        $action = app()->make(GuestFindLanguageHandler::class);

        return $action($query);
    }

    public function get(GuestGetLanguages $query): GuestLanguages
    {
        /** @var GuestGetLanguagesHandler $action */
        $action = app()->make(GuestGetLanguagesHandler::class);

        return $action($query);
    }
}
