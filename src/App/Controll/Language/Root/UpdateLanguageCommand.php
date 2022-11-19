<?php

declare(strict_types=1);

namespace App\Controll\Language\Root;

use App\Base\Model\Roles\Root;
use Domain\Core\Language\Root\Control\Commands\UpdateBaseLanguage;

final class UpdateLanguageCommand implements UpdateBaseLanguage
{
    public function __construct(
        private Root $root,
        private BaseLanguageCommandImp $base,
    ) {}

    public function root(): Root
    {
        return $this->root;
    }

    public function nativeName(): string
    {
        return $this->base->nativeName();
    }

    public function name(): string
    {
        return $this->base->name();
    }

    public function code(): string
    {
        return $this->base->code();
    }
}
