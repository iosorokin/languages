<?php

declare(strict_types=1);

namespace Domain\Core\Language\Root;

use App\Roles\ContentManager;
use Domain\Core\Language\Root\Control\Commands\CreateLanguageHandler;
use Domain\Core\Language\Root\Control\Commands\DeleteLanguageHandler;
use Domain\Core\Language\Root\Control\Commands\RootCreateLanguage;
use Domain\Core\Language\Root\Control\Commands\RootDeleteLanguage;
use Domain\Core\Language\Root\Control\Commands\RootUpdateLanguage;
use Domain\Core\Language\Root\Control\Commands\UpdateLanguageHandler;
use Domain\Core\Language\Root\Control\Queries\FindLanguageHandler;
use Domain\Core\Language\Root\Control\Queries\GetLanguagesHandler;
use Domain\Core\Language\Root\Control\Queries\RootFindLanguage;
use Domain\Core\Language\Root\Control\Queries\RootGetLanguages;
use Domain\Core\Language\Root\Model\Aggregates\RootLanguage;
use Domain\Core\Language\Root\Model\Collections\RootLanguages;

final class LanguageManagerModuleProd implements LanguageManagerModule
{
    public function create(ContentManager $manager, RootCreateLanguage $command): int
    {
        /** @var CreateLanguageHandler $action */
        $action = app()->make(CreateLanguageHandler::class);

        return $action($manager, $command);
    }

    public function update(ContentManager $manager, RootUpdateLanguage $command): void
    {
        /** @var UpdateLanguageHandler $action */
        $action = app()->make(UpdateLanguageHandler::class);
        $action($manager, $command);
    }

    public function delete(ContentManager $manager, RootDeleteLanguage $command): void
    {
        /** @var DeleteLanguageHandler $action */
        $action = app()->make(DeleteLanguageHandler::class);
        $action($manager, $command);
    }

    public function find(ContentManager $manager, RootFindLanguage $query): RootLanguage
    {
        /** @var FindLanguageHandler $action */
        $action = app()->make(FindLanguageHandler::class);

        return $action($manager, $query);
    }

    public function get(ContentManager $manager, RootGetLanguages $query): RootLanguages
    {
        /** @var GetLanguagesHandler $action */
        $action = app()->make(GetLanguagesHandler::class);

        return $action($manager, $query);
    }
}
