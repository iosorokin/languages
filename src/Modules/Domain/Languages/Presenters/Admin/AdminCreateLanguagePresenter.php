<?php

namespace Modules\Domain\Languages\Presenters\Admin;

use Modules\Domain\Languages\Structures\Language;

interface AdminCreateLanguagePresenter
{
    public function __invoke(array $attributes): Language;
}
