<?php

namespace Modules\Core\Languages\Presenters\Admin;

use Modules\Core\Languages\Entities\Language;

interface AdminGetLanguagePresenter
{
    public function __invoke(int $id): Language;
}