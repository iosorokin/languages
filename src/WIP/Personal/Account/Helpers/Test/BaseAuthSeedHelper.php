<?php

declare(strict_types=1);

namespace WIP\Personal\Account\Helpers\Test;

use App\Base\Test\Helpers\ModuleHelper;
use WIP\Personal\Account\Dto\BaseLoginDto;

final class BaseAuthSeedHelper extends ModuleHelper
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
