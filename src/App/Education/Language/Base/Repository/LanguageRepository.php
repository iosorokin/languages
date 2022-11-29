<?php

declare(strict_types=1);

namespace App\Education\Language\Base\Repository;

use Core\Base\Collections\Collection;
use App\Education\Language\Base\Repository\Query\Find\FindLanguage;
use App\Education\Language\Base\Repository\Structure\LanguageStructure;
use App\Education\Language\Root\Control\Cases\Dto\GetLanguageDto;
use App\Education\Language\Root\Control\Cases\Dto\GetLanguagesDto;

interface LanguageRepository
{
    public function find(FindLanguage $query): LanguageStructure;

    public function get(GetLanguagesDto $dto): Collection;
}
