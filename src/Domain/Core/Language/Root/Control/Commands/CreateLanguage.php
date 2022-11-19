<?php

namespace Domain\Core\Language\Root\Control\Commands;

use App\Base\Model\Roles\Root;

interface CreateLanguage extends BaseLanguageCommand
{
    public function root(): Root;
}
