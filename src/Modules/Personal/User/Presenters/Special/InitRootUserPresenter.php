<?php

namespace Modules\Personal\User\Presenters\Special;

use Modules\Personal\User\Entities\User;

interface InitRootUserPresenter
{
    public function __invoke(array $attributes): User;
}
