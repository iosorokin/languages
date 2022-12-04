<?php

declare(strict_types=1);

namespace Domain\Education\Language\Base\Repository\Query\Find;

final class FindByCode implements FindLanguage
{
    public function __construct(
        private string $code,
    ) {}

    public function get(): string
    {
        return $this->code;
    }

    public function __toString(): string
    {
        return $this->get();
    }
}
