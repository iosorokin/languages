<?php

declare(strict_types=1);

namespace App\Controll\Language\Root;

use Domain\Core\Language\Root\Control\Commands\BaseLanguageCommand;

final class BaseLanguageCommandImp implements BaseLanguageCommand
{
    public function __construct(
        private string $name,
        private string $nativeName,
        private string $code,
    ) {}

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
