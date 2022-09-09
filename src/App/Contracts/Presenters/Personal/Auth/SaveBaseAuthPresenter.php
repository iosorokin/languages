<?php

namespace App\Contracts\Presenters\Personal\Auth;

use App\Contracts\Structures\Personal\BaseAuthStructure;

interface SaveBaseAuthPresenter
{
    public function __invoke(BaseAuthStructure $baseAuth): void;
}
