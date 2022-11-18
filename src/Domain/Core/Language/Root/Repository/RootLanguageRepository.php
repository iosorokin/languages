<?php

namespace Domain\Core\Language\Root\Repository;

use Domain\Core\Language\Root\Repository\Dto\CreateLanguageDto;
use Domain\Core\Language\Root\Repository\Dto\UpdateLanguageDto;

interface RootLanguageRepository
{
    public function add(CreateLanguageDto $dto): int;

    public function update(UpdateLanguageDto $dto): void;

    public function delete(string $code): void;
}
