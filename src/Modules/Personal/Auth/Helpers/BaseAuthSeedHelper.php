<?php

declare(strict_types=1);

namespace Modules\Personal\Auth\Helpers;

use Core\Base\Helpers\AppHelper;

final class BaseAuthSeedHelper extends AppHelper
{
    public function generateAttributes(): array
    {
        return [
            'email' => $this->faker()->unique()->safeEmail(),
            'password' => $this->faker()->password(8, 255),
        ];
    }
}
