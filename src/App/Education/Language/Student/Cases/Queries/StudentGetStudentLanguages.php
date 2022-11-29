<?php

declare(strict_types=1);

namespace App\Education\Language\Student\Control\Queries;

final class StudentGetStudentLanguages
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
