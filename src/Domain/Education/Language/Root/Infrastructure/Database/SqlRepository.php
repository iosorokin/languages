<?php

declare(strict_types=1);

namespace Domain\Education\Language\Root\Infrastructure\Database;

use Domain\Education\Language\Root\Infrastructure\Database\Structures\WriteLanguageStructure;

final class SqlRepository implements LanguageRepository
{
    public const TABLE = 'languages';

    public function add(WriteLanguageStructure $language): void
    {

    }
}
