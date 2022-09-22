<?php

declare(strict_types=1);

namespace App\Contracts\Presenters\Personal\Employers;

interface CreateSuperAdminPresenter
{
    public function __invoke(array $attributes): void;
}
