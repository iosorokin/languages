<?php

namespace Modules\Domain\Sources\Factories;

use Modules\Domain\Languages\Structures\Language;
use Modules\Domain\Sources\Structures\Source;
use Modules\Personal\User\Structures\User;

interface SourceFactory
{
    public function new(User $user, Language $language, array $attributes): Source;
}
