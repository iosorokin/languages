<?php

namespace Domain\Core\Languages\Actions\Manager\Dto;

interface LanguageDto
{
    public function name(): string;

    public function nativeName(): string;

    public function code(): string;
}
