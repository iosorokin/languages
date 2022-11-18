<?php

declare(strict_types=1);

namespace Domain\Core\Language\Root\Control\Commands;

final class LanguageCommand
{
    public function __construct(
        private string $name,
        private string $nativeName,
        private string $code,
    ) {}

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
