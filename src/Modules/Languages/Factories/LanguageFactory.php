<?php

namespace Modules\Languages\Factories;

use Modules\Languages\Entity\Language;
use Modules\Personal\User\Entities\User;

interface LanguageFactory
{
    public function new(User $user, array $attributes): Language;
}
