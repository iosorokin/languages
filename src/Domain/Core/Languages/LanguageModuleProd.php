<?php

declare(strict_types=1);

namespace Domain\Core\Languages;

use App\Roles\ContentManager;
use Domain\Core\Languages\Actions\Manager\Dto\CreateLanguageDto;
use Domain\Core\Languages\Actions\Manager\Dto\UpdateLanguageDto;
use Domain\Core\Languages\Actions\Manager\ManagerCreateLanguage;
use Domain\Core\Languages\Actions\Manager\ManagerDeleteLanguage;
use Domain\Core\Languages\Actions\Manager\ManagerUpdateLanguage;
use Domain\Core\Languages\Model\Agregates\Language\Language;
use Domain\Core\Languages\Model\Collections\Languages;

final class LanguageModuleProd implements LanguageModule
{
    public function managerCreate(ContentManager $manager, CreateLanguageDto $dto): int
    {
        /** @var ManagerCreateLanguage $action */
        $action = app()->make(ManagerCreateLanguage::class);

        return $action($manager, $dto);
    }

    public function managerUpdate(ContentManager $manager, UpdateLanguageDto $dto): void
    {
        /** @var ManagerUpdateLanguage $action */
        $action = app()->make(ManagerUpdateLanguage::class);
        $action($manager, $dto);
    }

    public function managerDelete(ContentManager $manager, int $id): void
    {
        /** @var ManagerDeleteLanguage $action */
        $action = app()->make(ManagerDeleteLanguage::class);
        $action($manager, $id);
    }

    public function managerShow(int $languageId): Language
    {

    }

    public function managerIndex(): Languages
    {

    }
}
