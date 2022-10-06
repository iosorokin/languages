<?php

namespace Modules\Domain\Sources\Factories;

use Modules\Domain\Languages\Entities\Language;
use Modules\Domain\Sources\Entities\Source;
use Modules\Personal\User\Entities\User;

interface SourceFactory
{
    public function new(User $user, Language $language, array $attributes): Source;
}
