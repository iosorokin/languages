<?php

declare(strict_types=1);

namespace Domain\Core\Language\Root\Control\Commands;

final class CreateLanguage
{
    public function __construct(
        private LanguageCommand $base,
    ) {}

    public function nativeName(): string
    {
        return $this->base->nativeName();
    }

    public function name(): string
    {
        return $this->base->name();
    }

    public function code(): string
    {
        return $this->base->code();
    }
}
