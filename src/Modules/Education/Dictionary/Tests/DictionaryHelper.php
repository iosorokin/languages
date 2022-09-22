<?php

declare(strict_types=1);

namespace Modules\Education\Dictionary\Tests;

use Core\Test\Helper;

final class DictionaryHelper extends Helper
{
    public function generateAttributes(): array
    {
        return [
            'title' => $this->faker()->title(),
            'description' => $this->faker()->text(),
        ];
    }
}
