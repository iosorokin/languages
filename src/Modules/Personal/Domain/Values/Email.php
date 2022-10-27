<?php

declare(strict_types=1);

namespace Modules\Personal\Domain\Values;

final class Email
{
    private string $email;

    public function __construct(mixed $email)
    {
        $this->email = $email;
    }

    public function value(): string
    {
        return $this->email;
    }
}
