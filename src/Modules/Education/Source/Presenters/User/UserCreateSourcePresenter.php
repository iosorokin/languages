<?php

declare(strict_types=1);

namespace Modules\Education\Source\Presenters\User;

use Modules\Education\Source\Entity\Source;
use Modules\Personal\User\Entities\User;

interface UserCreateSourcePresenter
{
    public function __invoke(User $user, array $attributes): Source;
}
