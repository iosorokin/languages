<?php

declare(strict_types=1);

namespace Domain\Root\Core\Language\Control\Queries;

final class RootGetLanguages
{
    private ?string $name;

    private ?string $code;

    public function __construct(array $attributes)
    {
        $this->code = $attributes['code'] ?? null;
        $this->name = $attributes['name'] ?? null;
    }

    public function code(): ?string
    {
        return $this->code;
    }

    public function name(): ?string
    {
        return $this->name;
    }
}
