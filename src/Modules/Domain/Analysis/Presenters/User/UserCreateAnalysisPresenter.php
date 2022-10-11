<?php

namespace Modules\Domain\Analysis\Presenters\User;

use Modules\Domain\Analysis\Entities\Analysis;

interface UserCreateAnalysisPresenter
{
    public function __invoke(array $attributes): Analysis;
}
