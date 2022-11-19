<?php

declare(strict_types=1);

namespace Domain\Core\Language\Base\Repository;

use App\Base\Collections\Collection;
use Domain\Core\Language\Base\Control\Query\FindLanguage;
use Domain\Core\Language\Base\Control\Query\GetLanguages;
use Domain\Core\Language\Base\Repository\Structure\LanguageStructure;

interface LanguageRepository
{
    public function find(FindLanguage $query): LanguageStructure;

    public function get(GetLanguages $query): Collection;
}
