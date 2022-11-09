<?php

namespace Domain\Core\Languages;

use App\Roles\ContentManager;
use Domain\Core\Languages\Actions\Manager\Dto\CreateLanguageDto;
use Domain\Core\Languages\Actions\Manager\Dto\UpdateLanguageDto;
use Domain\Core\Languages\Model\Agregates\Language\Language;
use Domain\Core\Languages\Model\Collections\Languages;

interface LanguageModule
{
    public function managerCreate(ContentManager $manager, CreateLanguageDto $dto): int;

    public function managerUpdate(ContentManager $manager, UpdateLanguageDto $dto): void;

    public function managerDelete(ContentManager $manager, int $id): void;

    public function managerShow(int $languageId): Language;

    public function managerIndex(): Languages;
}
