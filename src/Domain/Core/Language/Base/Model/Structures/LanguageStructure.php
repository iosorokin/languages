<?php

declare(strict_types=1);

namespace Domain\Core\Language\Base\Model\Structures;

use Carbon\Carbon;

abstract class LanguageStructure
{
    public function __construct(
        public readonly int $id,
        public readonly int $owner,
        public readonly string $name,
        public readonly string $nativeName,
        public readonly string $code,
        public readonly bool $isActive,
        public readonly Carbon $createdAt,
    ) {}
}
