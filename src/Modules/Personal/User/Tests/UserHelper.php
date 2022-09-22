<?php

declare(strict_types=1);

namespace Modules\Personal\User\Tests;

use Core\Test\Helper;

final class UserHelper extends Helper
{
    public function generateAttributes(): array
    {
        return [
            'name' => $this->faker()->name(),
        ];
    }
}
