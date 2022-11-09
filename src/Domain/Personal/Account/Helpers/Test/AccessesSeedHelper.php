<?php

declare(strict_types=1);

namespace Domain\Personal\Account\Helpers\Test;

use App\Base\Helpers\AppHelper;

final class AccessesSeedHelper extends AppHelper
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
