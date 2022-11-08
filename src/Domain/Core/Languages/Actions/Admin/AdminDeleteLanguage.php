<?php

namespace Domain\Core\Languages\Actions\Admin;

use Domain\Core\Languages\Actions\Mixins\DeleteLanguage;
use Domain\Support\Authorization\Manager;

class AdminDeleteLanguage
{
    public function __construct(
        private DeleteLanguage $deleteLanguage,
    ) {}

    public function __invoke(Manager $manager, int $languageId): void
    {
        ($this->deleteLanguage)($manager, $language);
    }
}
