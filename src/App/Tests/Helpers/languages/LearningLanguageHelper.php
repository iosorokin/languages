<?php

declare(strict_types=1);

namespace App\Tests\Helpers\languages;

use Core\Test\Helper;

final class LearningLanguageHelper extends Helper
{
    public function generateAttributes(): array
    {
        return [
            'title' => $this->faker()->title(),
        ];
    }
}
