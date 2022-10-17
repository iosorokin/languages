<?php

namespace Modules\Domain\Sources\Repositories;

use Modules\Domain\Sources\Structures\Source;

interface SourceRepository
{
    public function save(Source $source): void;

    public function get(int $id): ?Source;

    public function ifUserFirstSourcesByLanguage(int $userId, int $languageId): bool;
}
