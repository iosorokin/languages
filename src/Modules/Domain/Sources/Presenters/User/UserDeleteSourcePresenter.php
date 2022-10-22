<?php

namespace Modules\Domain\Sources\Presenters\User;

interface UserDeleteSourcePresenter
{
    public function __invoke(int $source);
}
