<?php

declare(strict_types=1);

namespace Domain\Core\Source\Base\Test;

use Domain\Core\Language\Base\Test\LanguageAttributesTestHelper;
use Domain\Core\Source\Base\Model\Aggregate\Source;
use Domain\Core\Source\Base\Model\Aggregate\SourceImp;
use Infrastructure\Database\Structures\Language\LanguageStructureImp;
use Infrastructure\Database\Structures\Source\SourceStructureImp;

final class SourceModelTestHelper
{
    public static function createSource(array $overwrite = []): Source
    {
        $languageStructure = LanguageStructureImp::newFromArray(LanguageAttributesTestHelper::full());
        $sourceStructure = SourceStructureImp::createFromArray($languageStructure, SourceAttributesTestHelper::full());
        $source = SourceImp::restore($sourceStructure);

        return $source;
    }
}
