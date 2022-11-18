<?php

declare(strict_types=1);

namespace Domain\Core\Language\Base\Repository;

use Domain\Core\Language\Base\Control\Query\GetLanguages;
use Domain\Core\Language\Base\Repository\Dto\RestoreLanguageDto;
use Domain\Core\Language\Base\Repository\Query\Find\FindLanguage;

interface LanguageRepository
{
    public function find(FindLanguage $query): RestoreLanguageDto;

    public function get(GetLanguages $query): array;
}
