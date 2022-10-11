<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Entities;

trait LanguageAttributes
{
    private string $name;

    private string $nativeName;

    private string $code;

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setNativeName(string $name): self
    {
        $this->nativeName = $name;

        return $this;
    }

    public function getNativeName(): string
    {
        return $this->nativeName;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getCode(): string
    {
        return $this->code;
    }
}
