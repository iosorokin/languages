<?php

declare(strict_types=1);

namespace Domain\Core\Language\Guest;

use Domain\Core\Language\Guest\Control\Queries\GuestFindLanguage;
use Domain\Core\Language\Guest\Control\Queries\GuestFindLanguageHandler;
use Domain\Core\Language\Guest\Control\Queries\GuestGetLanguages;
use Domain\Core\Language\Guest\Control\Queries\GuestGetLanguagesHandler;
use Domain\Core\Language\Guest\Model\Aggregate\GuestLanguage;
use Domain\Core\Language\Guest\Model\Collection\GuestLanguages;

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
