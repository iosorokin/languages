<?php

declare(strict_types=1);

namespace App\Tests\Helpers\Personal;

use Core\Test\Helper;
use Illuminate\Testing\TestResponse;

final class BaseAuthHelper extends Helper
{
    public function generateAttributes(array $attributes = []): array
    {
        return [
            'email' => $this->faker()->safeEmail(),
            'password' => $this->faker()->password(8, 255),
        ];
    }
}
