<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Factories;

use Modules\Domain\Languages\Structures\Language;
use Modules\Domain\Languages\Structures\LanguageEntity;

final class EntityLanguageFactory extends BaseLanguageFactory
{
    protected function createStructure(): Language
    {
        return new LanguageEntity();
    }
}
