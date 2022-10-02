<?php

namespace Modules\Education\Source\Factory;

use Modules\Education\Source\Entity\Source;
use Modules\Languages\Entity\Language;
use Modules\Personal\User\Entities\User;

interface SourceFactory
{
    public function new(User $user, Language $language, array $attributes): Source;
}
