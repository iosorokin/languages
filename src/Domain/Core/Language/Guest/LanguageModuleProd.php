<?php

declare(strict_types=1);

namespace Domain\Core\Language\Guest;

use App\Model\Roles\Root;
use Domain\Core\Language\Root\Control\Commands\CreateLanguageHandler;
use Domain\Core\Language\Root\Control\Commands\DeleteLanguageHandler;
use Domain\Core\Language\Root\Control\Commands\CreateLanguage;
use Domain\Core\Language\Root\Control\Commands\DeleteLanguage;
use Domain\Core\Language\Root\Control\Commands\UpdateLanguage;
use Domain\Core\Language\Root\Control\Commands\UpdateLanguageHandler;
use Domain\Core\Language\Root\Control\Queries\FindLanguageHandler;
use Domain\Core\Language\Root\Control\Queries\GetLanguagesHandler;
use Domain\Core\Language\Root\Control\Queries\FindLanguage;
use Domain\Core\Language\Root\Control\Queries\GetLanguages;
use Domain\Core\Language\Root\Model\Aggregates\Language;
use Domain\Core\Language\Root\Model\Collections\Languages;

final class LanguageModuleProd implements LanguageModule
{
    public function create(Root $root, CreateLanguage $command): int
    {
        /** @var CreateLanguageHandler $action */
        $action = app()->make(CreateLanguageHandler::class);

        return $action($root, $command);
    }

    public function update(Root $root, UpdateLanguage $command): void
    {
        /** @var UpdateLanguageHandler $action */
        $action = app()->make(UpdateLanguageHandler::class);
        $action($root, $command);
    }

    public function delete(Root $root, DeleteLanguage $command): void
    {
        /** @var DeleteLanguageHandler $action */
        $action = app()->make(DeleteLanguageHandler::class);
        $action($root, $command);
    }

    public function find(Root $root, FindLanguage $query): Language
    {
        /** @var FindLanguageHandler $action */
        $action = app()->make(FindLanguageHandler::class);

        return $action($root, $query);
    }

    public function get(Root $root, GetLanguages $query): Languages
    {
        /** @var GetLanguagesHandler $action */
        $action = app()->make(GetLanguagesHandler::class);

        return $action($root, $query);
    }
}
