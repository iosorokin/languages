<?php

declare(strict_types=1);

namespace Domain\Education\Language\Base\Repository;

use Core\Base\Collections\Collection;
use Domain\Education\Language\Base\Repository\Query\Find\FindLanguage;
use Domain\Education\Language\Base\Repository\Structure\LanguageStructure;
use Domain\Education\Language\Root\Control\Cases\Dto\GetLanguageDto;
use Domain\Education\Language\Root\Control\Cases\Dto\GetLanguagesDto;

interface LanguageRepository
{
    public function find(FindLanguage $query): LanguageStructure;

    public function get(GetLanguagesDto $dto): Collection;
}
