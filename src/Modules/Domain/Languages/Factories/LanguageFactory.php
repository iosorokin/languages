<?php

namespace Modules\Domain\Languages\Factories;

use Modules\Domain\Languages\Entities\Language;
use Modules\Personal\User\Entities\User;

interface LanguageFactory
{
    public function new(User $user, array $attributes): Language;
}
