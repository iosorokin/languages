<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Factories;

use Modules\Domain\Languages\Entities\Language;
use Modules\Domain\Languages\Entities\LanguageEntity;

final class EntityLanguageFactory extends BaseLanguageFactory
{
    protected function createStructure(): Language
    {
        return new LanguageEntity();
    }
}
