<?php

namespace App\Education\Language\Root\Infrastructure\Database;

use App\Education\Language\Root\Control\Cases\Dto\GetLanguageDto;
use App\Education\Language\Root\Control\Cases\Dto\GetLanguagesDto;
use App\Education\Language\Root\Infrastructure\Database\Structures\WriteLanguageStructure;

interface LanguageRepository
{
    public function add(WriteLanguageStructure $language): void;

    public function update(WriteLanguageStructure $language): void;

    public function delete(string $code): void;

    public function find(GetLanguageDto $dto): WriteLanguageStructure;

    public function get(GetLanguagesDto $dto): array;
}
