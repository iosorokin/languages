<?php

declare(strict_types=1);

namespace Domain\Core\Language\Base\Repository\Dto;

use Carbon\Carbon;

final class LanguageDtoImp implements LanguageDto
{
    public function __construct(
        private readonly string $code,
        private readonly int $owner,
        private readonly string $name,
        private readonly string $nativeName,
        private readonly string $status,
        private readonly Carbon $createdAt,
    ){}

    public function code(): string
    {
        return $this->code;
    }

    public function owner(): int
    {
        return $this->owner;
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
