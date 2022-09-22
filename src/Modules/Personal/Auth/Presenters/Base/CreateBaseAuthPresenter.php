<?php

namespace Modules\Personal\Auth\Presenters\Base;

use Modules\Personal\Auth\Structures\BaseAuthStructure;

interface CreateBaseAuthPresenter
{
    public function __invoke(array $attributes): BaseAuthStructure;
}
