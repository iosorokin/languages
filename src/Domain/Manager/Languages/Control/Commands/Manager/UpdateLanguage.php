<?php

declare(strict_types=1);

namespace Domain\Core\Languages\Model\Manager\Commands\Manager;

interface UpdateLanguage extends LanguageCommand
{
    public function id(): int;
}
