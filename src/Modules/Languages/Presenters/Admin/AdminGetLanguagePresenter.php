<?php

namespace Modules\Languages\Presenters\Admin;

use Modules\Languages\Entity\Language;

interface AdminGetLanguagePresenter
{
    public function __invoke(int $id): Language;
}
