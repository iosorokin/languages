<?php

namespace Modules\Core\Languages\Factories;

use Modules\Core\Languages\Entities\Language;
use Modules\Personal\User\Entities\User;

interface LanguageFactory
{
    public function new(User $user, array $attributes): Language;
}