<?php

declare(strict_types=1);

namespace Domain\Core\Language\Root;

use App\Model\Roles\Root;
use Domain\Core\Language\Root\Control\Commands\RootCreateLanguageHandler;
use Domain\Core\Language\Root\Control\Commands\RootDeleteLanguageHandler;
use Domain\Core\Language\Root\Control\Commands\RootCreateLanguage;
use Domain\Core\Language\Root\Control\Commands\RootDeleteLanguage;
use Domain\Core\Language\Root\Control\Commands\RootUpdateLanguage;
use Domain\Core\Language\Root\Control\Commands\RootUpdateLanguageHandler;
use Domain\Core\Language\Root\Control\Queries\RootFindLanguageHandler;
use Domain\Core\Language\Root\Control\Queries\RootGetLanguagesHandler;
use Domain\Core\Language\Root\Control\Queries\RootFindLanguage;
use Domain\Core\Language\Root\Control\Queries\RootGetLanguages;
use Domain\Core\Language\Root\Model\Aggregates\RootLanguage;
use Domain\Core\Language\Root\Model\Collections\Languages;

final class RootLanguageModuleProd implements RootLanguageModule
{
    public function create(Root $root, RootCreateLanguage $command): int
    {
        /** @var RootCreateLanguageHandler $action */
        $action = app()->make(RootCreateLanguageHandler::class);

        return $action($root, $command);
    }

    public function update(Root $root, RootUpdateLanguage $command): void
    {
        /** @var RootUpdateLanguageHandler $action */
        $action = app()->make(RootUpdateLanguageHandler::class);
        $action($root, $command);
    }

    public function delete(Root $root, RootDeleteLanguage $command): void
    {
        /** @var RootDeleteLanguageHandler $action */
        $action = app()->make(RootDeleteLanguageHandler::class);
        $action($root, $command);
    }

    public function find(Root $root, RootFindLanguage $query): RootLanguage
    {
        /** @var RootFindLanguageHandler $action */
        $action = app()->make(RootFindLanguageHandler::class);

        return $action($root, $query);
    }

    public function get(Root $root, RootGetLanguages $query): Languages
    {
        /** @var RootGetLanguagesHandler $action */
        $action = app()->make(RootGetLanguagesHandler::class);

        return $action($root, $query);
    }
}
