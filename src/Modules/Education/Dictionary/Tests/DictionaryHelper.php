<?php

declare(strict_types=1);

namespace Modules\Education\Dictionary\Tests;

use Core\Base\Helpers\AppHelper;

final class DictionaryHelper extends AppHelper
{
    public function generateAttributes(): array
    {
        return [
            'title' => $this->faker()->title(),
            'description' => $this->faker()->text(),
        ];
    }
}
