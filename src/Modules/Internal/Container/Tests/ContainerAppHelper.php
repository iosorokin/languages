<?php

declare(strict_types=1);

namespace Modules\Internal\Container\Tests;

use Core\Base\Helpers\AppHelper;

final class ContainerAppHelper extends AppHelper
{
    public function generateAttributes(): array
    {
        return [
            'title' => $this->faker()->title(),
            'description' => $this->faker()->text(),
        ];
    }
}
