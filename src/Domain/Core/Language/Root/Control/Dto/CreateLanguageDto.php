<?php

declare(strict_types=1);

namespace Domain\Core\Language\Root\Control\Dto;

final class CreateLanguageDto
{
    public function __construct(
        private int    $owner,
        private string $nativeName,
        private string $name,
        private string $code,
    ) {}

    public function owner(): int
    {
        return $this->owner;
    }

    public function nativeName(): string
    {
        return $this->nativeName;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function code(): string
    {
        return $this->code;
    }
}
