<?php

declare(strict_types=1);

namespace Domain\Core\Language\Guest\Control\Queries;

final class GuestFindLanguage
{
    public function __construct(
        private string $code,
    ) {}

    public static function new(array $attribute): self
    {
        $query = new self(
            code: $attribute['code'],
        );

        return $query;
    }

    public function code(): string
    {
        return $this->code;
    }

    public function filters()
    {

    }
}
