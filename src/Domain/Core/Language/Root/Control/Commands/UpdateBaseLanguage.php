<?php

namespace Domain\Core\Language\Root\Control\Commands;

use App\Base\Model\Roles\Root;

interface UpdateBaseLanguage extends BaseLanguageCommand
{
    public function root(): Root;
}
