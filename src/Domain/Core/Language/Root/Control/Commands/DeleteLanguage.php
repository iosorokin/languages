<?php

declare(strict_types=1);

namespace Domain\Core\Language\Root\Control\Commands;

final class DeleteLanguage
{
    public function __construct(
        private string $code,
    ) {}

    public function code(): string
    {
        return $this->code;
    }
}
