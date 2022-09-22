<?php

namespace Modules\Personal\User\Presenters;

use Modules\Personal\User\Structures\UserStructure;

interface SaveUserPresenter
{
    public function __invoke(UserStructure $user): void;
}
