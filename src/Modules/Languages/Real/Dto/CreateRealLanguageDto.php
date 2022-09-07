<?php

namespace Modules\Languages\Real\Dto;

class CreateRealLanguageDto
{
    public function __construct(
        public readonly ?string $name,
        public readonly ?string $nativeName,
        public readonly ?string $code,
    ) {}
}
