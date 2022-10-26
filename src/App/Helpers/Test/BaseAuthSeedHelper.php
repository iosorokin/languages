<?php

declare(strict_types=1);

namespace App\Helpers\Test;

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
