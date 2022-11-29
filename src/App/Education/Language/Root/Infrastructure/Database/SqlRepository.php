<?php

declare(strict_types=1);

namespace App\Education\Language\Root\Infrastructure\Database;

use App\Education\Language\Root\Infrastructure\Database\Structures\WriteLanguageStructure;

final class SqlRepository implements LanguageRepository
{
    public const TABLE = 'languages';

    public function add(WriteLanguageStructure $language): void
    {

    }
}
