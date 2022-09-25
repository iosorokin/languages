<?php

declare(strict_types=1);

namespace Modules\Education\Rules\Tests;

use Core\Test\Helpers\AppHelper;

final class RuleHelper extends AppHelper
{
    public function generateAttributes(): array
    {
        return [
            'title' => $this->faker()->title(),
            'description' => $this->faker()->text(),
        ];
    }
}
