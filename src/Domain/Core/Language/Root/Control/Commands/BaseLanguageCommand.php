<?php

namespace Domain\Core\Language\Root\Control\Commands;

interface BaseLanguageCommand
{
    public function name(): string;

    public function nativeName(): string;

    public function code(): string;
}
