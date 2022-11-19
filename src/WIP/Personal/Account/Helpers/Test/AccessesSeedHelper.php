<?php

declare(strict_types=1);

namespace WIP\Personal\Account\Helpers\Test;

use App\Base\Test\Helpers\ModuleHelper;

final class AccessesSeedHelper extends ModuleHelper
{
    public function generateAttributes(): array
    {
        return [
            'accesses' => [
                'is_student' => true,
                'is_root' => false,
            ]
        ];
    }
}
