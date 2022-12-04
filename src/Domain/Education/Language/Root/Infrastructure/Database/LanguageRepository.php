<?php

namespace Domain\Education\Language\Root\Infrastructure\Database;

use Domain\Education\Language\Root\Control\Cases\Dto\GetLanguageDto;
use Domain\Education\Language\Root\Control\Cases\Dto\GetLanguagesDto;
use Domain\Education\Language\Root\Infrastructure\Database\Structures\WriteLanguageStructure;

interface LanguageRepository
{
    public function add(WriteLanguageStructure $language): void;

    public function update(WriteLanguageStructure $language): void;

    public function delete(string $code): void;

    public function find(GetLanguageDto $dto): WriteLanguageStructure;

    public function get(GetLanguagesDto $dto): array;
}
