<?php

declare(strict_types=1);

namespace Modules\Education\Dictionary\Factories;

use Modules\Education\Dictionary\Entities\Dictionary;
use Modules\Languages\Entities\Language;
use Modules\Personal\User\Entities\User;

interface DictionaryFactory
{
    public function create(User $user, Language $language, array $attributes): Dictionary;
}
