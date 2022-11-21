<?php

declare(strict_types=1);

namespace Domain\Core\Language\Base\Repository;

use App\Base\Collections\Collection;
use Domain\Core\Language\Base\Repository\Structure\LanguageStructure;
use Domain\Core\Language\Root\Control\Dto\FindLanguageDto;
use Domain\Core\Language\Root\Control\Dto\GetLanguagesDto;

interface LanguageRepository
{
    public function find(FindLanguageDto $dto): LanguageStructure;

    public function get(GetLanguagesDto $dto): Collection;
}
