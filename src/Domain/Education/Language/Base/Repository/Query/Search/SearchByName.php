<?php

declare(strict_types=1);

namespace Domain\Education\Language\Base\Repository\Query\Search;

final class SearchByName implements SearchLanguage
{
    public function __construct(
        private string $name,
    ) {}

    public function value(): string
    {
        return $this->name;
    }

    public function __toString(): string
    {
        return $this->value();
    }
}
