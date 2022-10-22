<?php

namespace Modules\Domain\Sources\Presenters\User;

use Modules\Domain\Sources\Structures\Source;

interface UserShowSourcePresenter
{
    public function __invoke(int $source): Source;
}
