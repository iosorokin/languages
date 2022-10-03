<?php

namespace Modules\Education\Dictionary\Presenters\User;

use Modules\Education\Dictionary\Entity\Dictionary;

interface UserCreateDictionaryPresenter
{
    public function __invoke(array $attributes): Dictionary;
}
