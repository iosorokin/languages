<?php

namespace Modules\Domain\Sources\Repositories;

use App\Base\Repository\SqlRepository;
use Modules\Domain\Sources\Structures\Source;

interface SourceRepository extends SqlRepository
{
    public function save(Source $source): void;

    public function get(int $id): ?Source;

    public function isUserFirstSourcesByLanguage(int $userId, int $languageId): bool;
}
