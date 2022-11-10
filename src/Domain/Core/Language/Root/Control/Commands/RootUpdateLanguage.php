<?php

declare(strict_types=1);

namespace Domain\Core\Language\Root\Control\Commands;

interface RootUpdateLanguage extends BaseLanguageCommand
{
    public function id(): int;
}
