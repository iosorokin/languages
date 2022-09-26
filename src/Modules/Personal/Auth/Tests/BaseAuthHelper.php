<?php

declare(strict_types=1);

namespace Modules\Personal\Auth\Tests;

use Core\Base\Helpers\AppHelper;
use Illuminate\Contracts\Auth\Authenticatable;
use Modules\Personal\Auth\Services\AuthService;

final class BaseAuthHelper extends AppHelper
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
