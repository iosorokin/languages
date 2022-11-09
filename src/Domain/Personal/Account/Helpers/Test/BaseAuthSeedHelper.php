<?php

declare(strict_types=1);

namespace Domain\Personal\Account\Helpers\Test;

use App\Base\Helpers\AppHelper;
use Domain\Personal\Account\Dto\BaseLoginDto;

final class BaseAuthSeedHelper extends AppHelper
{
    public function generateAttributes(): array
    {
        return [
            'email' => $this->faker()->unique()->safeEmail(),
            'password' => $this->faker()->password(8, 255),
        ];
    }

    public function baseLoginDto(array $overwrite = []): BaseLoginDto
    {
        $attributes = $overwrite + $this->generateAttributes();

        return new BaseLoginDto($attributes);
    }
}
