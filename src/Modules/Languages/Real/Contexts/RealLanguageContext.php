<?php

namespace Modules\Languages\Real\Contexts;

use App\Structures\Languages\RealLanguageStructure;

class RealLanguageContext
{
    public function __construct(
        public readonly RealLanguageStructure $structure,
    ) {}

    public function setName(mixed $name): self
    {
        $this->structure->name = $name;

        return $this;
    }

    public function setNativeName(mixed $nativeName): self
    {
        $this->structure->native_name = $nativeName;

        return $this;
    }

    public function setCode(mixed $code): self
    {
        $this->structure->code = $code;

        return $this;
    }
}
