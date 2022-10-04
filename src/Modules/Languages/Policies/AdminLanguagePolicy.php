<?php

namespace Modules\Languages\Policies;

use Modules\Personal\Auth\Contexts\Client;

interface AdminLanguagePolicy
{
    public function canCreate(): Client;
}
