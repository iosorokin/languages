<?php

declare(strict_types=1);

namespace Modules\Core\Sources\Presenters\User;

use Modules\Core\Sources\Entities\Source;

interface UserCreateSourcePresenter
{
    public function __invoke(array $attributes): Source;
}
