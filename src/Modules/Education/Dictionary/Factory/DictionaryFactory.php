<?php

declare(strict_types=1);

namespace Modules\Education\Dictionary\Factory;

use Modules\Education\Dictionary\Entity\Dictionary;
use Modules\Languages\Entity\Language;
use Modules\Personal\User\Entities\User;

interface DictionaryFactory
{
    public function create(User $user, Language $language, array $attributes): Dictionary;
}
