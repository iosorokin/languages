<?php

declare(strict_types=1);

namespace Domain\Manager\Languages;

use App\Roles\ContentManager;
use Domain\Core\Languages\Model\Manager\Commands\Manager\CreateLanguage;
use Domain\Core\Languages\Model\Manager\Commands\Manager\DeleteLanguage;
use Domain\Core\Languages\Model\Manager\Commands\Manager\ManagerCreateLanguageHandler;
use Domain\Core\Languages\Model\Manager\Commands\Manager\ManagerDeleteLanguageHandler;
use Domain\Core\Languages\Model\Manager\Commands\Manager\ManagerUpdateLanguageHandler;
use Domain\Core\Languages\Model\Manager\Commands\Manager\UpdateLanguage;
use Domain\Core\Languages\Model\Manager\Queries\FindLanguage;
use Domain\Core\Languages\Model\Manager\Queries\GetLanguages;
use Domain\Core\Languages\Model\Manager\Queries\Manager\ManagerFindLanguage;
use Domain\Core\Languages\Model\Manager\Queries\Manager\ManagerGetLanguages;
use Domain\Core\Languages\Model\Manager\Responses\LanguageResponse;
use Domain\Core\Languages\Model\Manager\Responses\LanguagesResponse;

final class LanguageManagerModuleProd implements LanguageManagerModule
{
    public function create(ContentManager $manager, CreateLanguage $command): int
    {
        /** @var ManagerCreateLanguageHandler $action */
        $action = app()->make(ManagerCreateLanguageHandler::class);

        return $action($manager, $command);
    }

    public function update(ContentManager $manager, UpdateLanguage $command): void
    {
        /** @var ManagerUpdateLanguageHandler $action */
        $action = app()->make(ManagerUpdateLanguageHandler::class);
        $action($manager, $command);
    }

    public function delete(ContentManager $manager, DeleteLanguage $command): void
    {
        /** @var ManagerDeleteLanguageHandler $action */
        $action = app()->make(ManagerDeleteLanguageHandler::class);
        $action($manager, $command);
    }

    public function find(ContentManager $manager, FindLanguage $query): LanguageResponse
    {
        /** @var ManagerFindLanguage $action */
        $action = app()->make(ManagerFindLanguage::class);

        return $action($manager, $query);
    }

    public function get(ContentManager $manager, GetLanguages $query): LanguagesResponse
    {
        /** @var ManagerGetLanguages $action */
        $action = app()->make(ManagerGetLanguages::class);

        return $action($manager, $query);
    }
}
