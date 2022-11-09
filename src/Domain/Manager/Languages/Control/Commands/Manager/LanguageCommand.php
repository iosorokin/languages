<?php

namespace Domain\Core\Languages\Model\Manager\Commands\Manager;

interface LanguageCommand
{
    public function name(): string;

    public function nativeName(): string;

    public function code(): string;
}
