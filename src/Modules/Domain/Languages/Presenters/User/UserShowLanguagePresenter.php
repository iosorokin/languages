<?php

namespace Modules\Domain\Languages\Presenters\User;

use Modules\Domain\Languages\Structures\Language;

interface UserShowLanguagePresenter
{
    public function __invoke(array $attributes): Language;
}
