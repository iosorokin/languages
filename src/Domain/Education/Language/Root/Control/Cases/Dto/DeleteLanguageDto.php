<?php

declare(strict_types=1);

namespace Domain\Education\Language\Root\Control\Cases\Dto;

final class DeleteLanguageDto
{
    private function __construct(
        public readonly string $code,
    ) {}

    public static function new(string $code): self
    {
        return new self()
    }
}
