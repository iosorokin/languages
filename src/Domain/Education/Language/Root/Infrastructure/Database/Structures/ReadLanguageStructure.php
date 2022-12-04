<?php

declare(strict_types=1);

namespace Domain\Education\Language\Root\Infrastructure\Database\Structures;

use Core\Base\Database\Structure;
use Carbon\Carbon;

final class ReadLanguageStructure extends Structure
{
    public function __construct(
        public readonly OwnerStructure $ownerId,
        public readonly string $nativeName,
        public readonly string $name,
        public readonly string $code,
        public readonly Carbon $createdAt,
    ) {}
}
