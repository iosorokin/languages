<?php

declare(strict_types=1);

namespace App\Tests\Helpers\Personal;

use Core\Test\Helper;
use Illuminate\Contracts\Auth\Authenticatable;
use Modules\Personal\Auth\Services\AuthService;

final class BaseAuthHelper extends Helper
{
    public function generateAttributes(): array
    {
        return [
            'email' => $this->faker()->unique()->safeEmail(),
            'password' => $this->faker()->password(8, 255),
        ];
    }

    public function loginLearner(Authenticatable $authenticatable): string
    {
        (app(AuthService::class))->login($authenticatable);
    }
}
