<?php

namespace App\Contracts\Presenters\Personal\Auth;

use App\Contracts\Structures\BaseAuthStructure;

interface SaveBaseAuthPresenter
{
    public function __invoke(BaseAuthStructure $baseAuth): void;
}
