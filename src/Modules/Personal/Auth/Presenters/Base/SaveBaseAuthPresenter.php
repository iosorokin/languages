<?php

namespace Modules\Personal\Auth\Presenters\Base;

use Modules\Personal\Auth\Structures\BaseAuthStructure;

interface SaveBaseAuthPresenter
{
    public function __invoke(BaseAuthStructure $baseAuth): void;
}
