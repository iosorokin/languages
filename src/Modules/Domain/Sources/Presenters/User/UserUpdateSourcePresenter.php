<?php

namespace Modules\Domain\Sources\Presenters\User;

interface UserUpdateSourcePresenter
{
    public function __invoke(int $source, array $attributes);
}
