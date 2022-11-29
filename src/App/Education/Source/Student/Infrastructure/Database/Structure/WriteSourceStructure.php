<?php

declare(strict_types=1);

namespace App\Education\Source\Student\Infrastructure\Database\Structure;

use Carbon\Carbon;
use Core\Base\Database\Structure;

final class WriteSourceStructure extends Structure
{
    public function __construct(
        public int $languageId,
        public int $studentId,
        public string $title,
        public string $description,
        public Carbon $createdAt,
    ) {}
}
