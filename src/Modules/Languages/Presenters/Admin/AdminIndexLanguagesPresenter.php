<?php

namespace Modules\Languages\Presenters\Admin;

use Illuminate\Contracts\Pagination\CursorPaginator;

interface AdminIndexLanguagesPresenter
{
    public function __invoke(array $attributes): CursorPaginator;
}
