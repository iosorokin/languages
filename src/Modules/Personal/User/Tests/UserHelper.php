<?php

declare(strict_types=1);

namespace Modules\Personal\User\Tests;

use Core\Base\Helpers\AppHelper;

final class UserHelper extends AppHelper
{
    public function generateAttributes(): array
    {
        return [
            'name' => $this->faker()->name(),
        ];
    }
}
