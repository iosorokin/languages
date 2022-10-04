<?php

namespace Modules\Education\Dictionary\Presenters\User;

use Modules\Education\Dictionary\Entities\Dictionary;

interface UserCreateDictionaryPresenter
{
    public function __invoke(array $attributes): Dictionary;
}
