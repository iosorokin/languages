<?php

namespace Domain\Core\Languages\Actions\Admin;

use Domain\Core\Languages\Actions\Mixins\CreateLanguage;
use Domain\Core\Languages\Dto\CreateLanguageDto;
use Domain\Support\Authorization\Manager;

class AdminCreateLanguage
{
    public function __construct(
        private CreateLanguage $createLanguage,
    ) {}

    public function __invoke(Manager $manager, CreateLanguageDto $dto): int
    {
        $language = ($this->createLanguage)($manager, $dto);

        return $language->id()->toInt();
    }
}
