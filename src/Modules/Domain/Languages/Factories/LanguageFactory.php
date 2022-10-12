<?php

namespace Modules\Domain\Languages\Factories;

use Modules\Domain\Languages\Structures\Language;
use Modules\Personal\User\Structures\User;

interface LanguageFactory
{
    public function create(User $user, array $attributes): Language;

    public function restore(array $attributes, ?User $user = null): Language;

    public function update(Language $language, array $attributes, ?User $user = null);
}
