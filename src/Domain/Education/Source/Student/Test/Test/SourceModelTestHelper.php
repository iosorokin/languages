<?php

declare(strict_types=1);

namespace Domain\Education\Source\Student\Test\Test;

use Domain\Education\Language\Base\Test\LanguageAttributesTestHelper;
use Domain\Education\Source\Student\Domain\Model\Aggregate\Source;
use Domain\Education\Source\Student\Domain\Model\Aggregate\Source;
use Core\Infrastructure\Database\Structures\Language\LanguageStructureImp;
use Core\Infrastructure\Database\Structures\Source\SourceStructureImp;

final class SourceModelTestHelper
{
    public static function createSource(array $overwrite = []): Source
    {
        $languageStructure = LanguageStructureImp::newFromArray(LanguageAttributesTestHelper::full());
        $sourceStructure = SourceStructureImp::createFromArray($languageStructure, SourceAttributesTestHelper::full());
        $source = Source::restore($sourceStructure);

        return $source;
    }
}
