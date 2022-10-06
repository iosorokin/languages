<?php

namespace Modules\Core\Sources\Factories;

use Modules\Core\Languages\Entities\Language;
use Modules\Core\Sources\Entities\Source;
use Modules\Personal\User\Entities\User;

interface SourceFactory
{
    public function new(User $user, Language $language, array $attributes): Source;
}
