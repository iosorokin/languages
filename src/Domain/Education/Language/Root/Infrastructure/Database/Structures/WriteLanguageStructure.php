<?php

declare(strict_types=1);

namespace Domain\Education\Language\Root\Infrastructure\Database\Structures;

use Core\Base\Database\Structure;
use Carbon\Carbon;
use Domain\Education\Language\Root\Domain\Model\Language;

final class WriteLanguageStructure extends Structure
{
    public function __construct(
        public readonly int    $ownerId,
        public readonly string $nativeName,
        public readonly string $name,
        public readonly string $code,
        public readonly Carbon $createdAt,
    ) {}

    public static function createFromEntity(Language $language): self
    {
        return new self(
            ownerId: $language->owner()->get(),
            nativeName: $language->nativeName()->get(),
            name: $language->name()->get(),
            code: $language->code()->get(),
            createdAt: $language->createdAt()->get(),
        );
    }
}
