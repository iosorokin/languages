<?php

declare(strict_types=1);

namespace Domain\Core\Language\Guest;

use Domain\Core\Language\Guest\Control\Queries\FindLanguage;
use Domain\Core\Language\Guest\Control\Queries\FindLanguageHandler;
use Domain\Core\Language\Guest\Control\Queries\GetLanguages;
use Domain\Core\Language\Guest\Control\Queries\GetLanguagesHandler;
use Domain\Core\Language\Guest\Model\Aggregate\Language;
use Domain\Core\Language\Guest\Model\Collection\Languages;

final class LanguageModuleProd implements LanguageModule
{
    public function find(FindLanguage $query): Language
    {
        /** @var FindLanguageHandler $action */
        $action = app()->make(FindLanguageHandler::class);

        return $action($query);
    }

    public function get(GetLanguages $query): Languages
    {
        /** @var GetLanguagesHandler $action */
        $action = app()->make(GetLanguagesHandler::class);

        return $action($query);
    }
}
