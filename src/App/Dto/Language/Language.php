<?php

declare(strict_types=1);

namespace App\Dto\Language;

abstract class Language
{
    protected string $name;
    protected string $nativeName;
    protected string $code;

    public function __construct(array $attributes)
    {
        $this->name = $attributes['name'];
        $this->nativeName = $attributes['native_name'];
        $this->code = $attributes['code'];
    }

    public function nativeName(): string
    {
        return $this->nativeName;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function code(): string
    {
        return $this->code;
    }
}
