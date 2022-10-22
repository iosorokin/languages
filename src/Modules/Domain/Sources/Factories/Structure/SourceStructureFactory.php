<?php

namespace Modules\Domain\Sources\Factories\Structure;

use Modules\Domain\Languages\Structures\Language;
use Modules\Domain\Sources\Structures\Source;
use Modules\Personal\User\Structures\User;

interface SourceStructureFactory
{
    public function new(User $user, Language $language, array $attributes): Source;
}
