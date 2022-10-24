<?php

declare(strict_types=1);

namespace Modules\Internal\Container\Helpers;

use Core\Base\Helpers\AppHelper;

final class ContainerSeedHelper extends AppHelper
{
    public function generateAttributes(): array
    {
        return [
            'title' => $this->faker()->sentence(),
            'description' => $this->faker()->text(),
        ];
    }
}