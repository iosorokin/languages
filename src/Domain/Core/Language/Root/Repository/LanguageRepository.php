<?php

namespace Domain\Core\Language\Root\Repository;

use Domain\Core\Language\Root\Control\Dto\FindLanguageDto;
use Domain\Core\Language\Root\Control\Dto\GetLanguagesDto;
use Domain\Core\Language\Root\Model\Language;
use Domain\Core\Language\Root\Model\LanguageCollection;

interface LanguageRepository
{
    public function add(Language $language): void;

    public function update(Language $language): void;

    public function delete(Language|string $code): void;

    public function find(FindLanguageDto $dto): Language;

    public function get(GetLanguagesDto $dto): LanguageCollection;
}
