<?php

namespace Modules\Domain\Languages\Presenters\Admin;

use Modules\Domain\Languages\Structures\Language;

interface AdminGetLanguagePresenter
{
    public function __invoke(int $id): Language;
}
