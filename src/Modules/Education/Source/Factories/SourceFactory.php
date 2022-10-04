<?php

namespace Modules\Education\Source\Factories;

use Modules\Education\Source\Entities\Source;
use Modules\Languages\Entities\Language;
use Modules\Personal\User\Entities\User;

interface SourceFactory
{
    public function new(User $user, Language $language, array $attributes): Source;
}
