<?php

declare(strict_types=1);

namespace Modules\Domain\Sources\Presenters\User;

use Modules\Domain\Sources\Structures\Source;

interface UserCreateSourcePresenter
{
    public function __invoke(array $attributes): Source;
}
