<?php

namespace Modules\Core\Languages\Policies;

use Modules\Personal\Auth\Contexts\Client;

interface AdminLanguagePolicy
{
    public function canCreate(): Client;
}