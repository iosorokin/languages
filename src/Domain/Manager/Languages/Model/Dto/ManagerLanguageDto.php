<?php

declare(strict_types=1);

namespace Domain\Core\Languages\Model\Manager\Dto;

final class ManagerLanguageDto
{
    public function __construct(
        private string $name,
        private string $nativeName,
        private string $code,
        private bool $isFavorite,
    ) {}

    public function name(): string
    {
        return $this->name;
    }

    public function nativeName(): string
    {
        return $this->nativeName;
    }

    public function code(): string
    {
        return $this->code;
    }

    public function isFavorite(): bool
    {
        return $this->isFavorite;
    }
}
