<?php

namespace Modules\Domain\Languages\Policies;

use Modules\Domain\Languages\Structures\Language;
use Modules\Personal\User\Structures\User;

interface LanguagePolicy
{
    public function canTakeToLearn(Language $language): void;
}
