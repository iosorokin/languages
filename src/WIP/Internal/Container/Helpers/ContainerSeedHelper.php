<?php

declare(strict_types=1);

namespace WIP\Internal\Container\Helpers;

use App\Base\Helpers\ModuleHelper;

final class ContainerSeedHelper extends ModuleHelper
{
    public function generateAttributes(): array
    {
        return [
            'title' => $this->faker()->sentence(),
            'description' => $this->faker()->text(),
        ];
    }
}
