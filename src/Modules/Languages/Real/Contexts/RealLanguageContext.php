<?php

namespace Modules\Languages\Real\Contexts;

use App\Contracts\Structures\Languages\RealLanguageStructure;

class RealLanguageContext
{
    public function __construct(
        public readonly RealLanguageStructure $structure,
    ) {}

    public function setId(int $id): self
    {
        $this->structure->id = $id;

        return $this;
    }

    public function getId(): int
    {
        return $this->structure->id;
    }

    public function setName(mixed $name): self
    {
        $this->structure->name = $name;

        return $this;
    }

    public function getName(): string
    {
        return $this->structure->name;
    }

    public function setNativeName(mixed $nativeName): self
    {
        $this->structure->native_name = $nativeName;

        return $this;
    }

    public function getNativeName(): string
    {
        return $this->structure->native_name;
    }

    public function setCode(mixed $code): self
    {
        $this->structure->code = $code;

        return $this;
    }

    public function getCode(): string
    {
        return $this->structure->code;
    }
}