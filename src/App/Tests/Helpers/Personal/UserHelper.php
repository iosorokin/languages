<?php

declare(strict_types=1);

namespace App\Tests\Helpers\Personal;

use Core\Test\Helper;
use Faker\Factory;

final class UserHelper extends Helper
{
    public function generateAttributes(): array
    {
        return [
            'name' => $this->faker()->name(),
        ];
    }
}
