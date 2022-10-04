<?php

declare(strict_types=1);

namespace Modules\Education\Source\Presenters\User;

use Modules\Education\Source\Entities\Source;
use Modules\Personal\User\Entities\User;

interface UserCreateSourcePresenter
{
    public function __invoke(array $attributes): Source;
}
