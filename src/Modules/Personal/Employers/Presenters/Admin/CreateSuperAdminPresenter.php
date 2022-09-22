<?php

declare(strict_types=1);

namespace Modules\Personal\Employers\Presenters\Admin;

interface CreateSuperAdminPresenter
{
    public function __invoke(array $attributes): void;
}
