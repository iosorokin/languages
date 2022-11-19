<?php

declare(strict_types=1);

namespace App\Controll\Language\Root;

use App\Base\Model\Roles\Root;
use Domain\Core\Language\Root\Control\Commands\DeleteLanguage;

final class DeleteLanguageImp implements DeleteLanguage
{
    public function __construct(
        private Root $root,
        private string $code,
    ) {}

    public function root(): Root
    {
        return $this->root;
    }

    public function code(): string
    {
        return $this->code;
    }
}
