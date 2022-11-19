<?php

namespace Domain\Core\Language\Root\Control\Commands;

use App\Base\Model\Roles\Root;

interface DeleteLanguage
{
    public function root(): Root;

    public function code(): string;
}
