<?php

declare(strict_types=1);

namespace Domain\Education\Language\Base\Test;

use Domain\Education\Language\Base\Model\Aggregate\Language;
use Domain\Education\Language\Base\Model\Aggregate\LanguageFactory;
use Core\Infrastructure\Database\Structures\Language\LanguageStructureImp;

final class LanguageFactoryTestHelper
{
    public static function create(array $overwrite = []): Language
    {
        $attributes = $overwrite + LanguageAttributesTestHelper::full();
        $dto = LanguageStructureImp::newFromArray($attributes);

        return LanguageFactory::restore($dto);
    }

    public static function collection(int $count = 1, array $overwrite = []): array
    {
        for ($i = 0; $i < $count; $i++) {
            $attributes = $overwrite + LanguageAttributesTestHelper::full();
            $dto = LanguageStructureImp::newFromArray($attributes);
            $collection[] = $dto;
        }

        return $collection ?? [];
    }
}
