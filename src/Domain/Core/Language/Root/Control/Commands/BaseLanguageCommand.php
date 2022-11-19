<?php

namespace Domain\Core\Language\Root\Control\Commands;

interface BaseLanguageCommand
{
    public function nativeName(): string;

    public function name(): string;

    public function code(): string;
}
