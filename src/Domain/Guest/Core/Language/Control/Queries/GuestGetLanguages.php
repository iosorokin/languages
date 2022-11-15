<?php

declare(strict_types=1);

namespace Domain\Guest\Core\Language\Control\Queries;

final class GuestGetLanguages
{
    private ?string $name;

    private ?string $code;

    public function __construct(array $attributes)
    {
        $this->code = $attributes['code'];
        $this->name = $attributes['name'];
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
