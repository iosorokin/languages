<?php

declare(strict_types=1);

namespace Domain\Education\Language\Base\Repository\Structure;

use Carbon\Carbon;

final class LanguageStructureImp implements LanguageStructure
{
    public function __construct(
        private readonly int $owner,
        private readonly string $code,
        private readonly string $name,
        private readonly string $nativeName,
        private readonly string $status,
        private readonly Carbon $createdAt,
    ) {}

    public function owner(): int
    {
        return $this->owner;
    }

    public function code(): string
    {
        return $this->code;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function nativeName(): string
    {
        return $this->nativeName;
    }

    public function status(): string
    {
        return $this->status;
    }

    public function createdAt(): Carbon
    {
        return $this->createdAt;
    }
}
