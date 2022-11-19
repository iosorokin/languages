<?php

namespace Domain\Core\Language\Root\Repository;


use Domain\Core\Language\Base\Repository\Structure\LanguageStructure;

interface RootLanguageRepository
{
    public function add(LanguageStructure $dto): int;

    public function update(LanguageStructure $dto): void;

    public function delete(string $code): void;
}
