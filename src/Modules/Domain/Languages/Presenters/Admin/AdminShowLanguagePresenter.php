<?php

namespace Modules\Domain\Languages\Presenters\Admin;

use Modules\Domain\Languages\Structures\Language;

interface AdminShowLanguagePresenter
{
    public function __invoke(int $id): Language;
}
