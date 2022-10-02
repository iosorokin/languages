<?php

namespace Modules\Languages\Policies;

use App\Contracts\Contexts\Client;

interface AdminLanguagePolicy
{
    public function canCreate(): Client;
}
