<?php

declare(strict_types=1);

namespace App\Tests\Helpers\Education;

use Core\Test\Helper;
use Illuminate\Support\Arr;

final class SourceHelper extends Helper
{
    public function generateAttributes(): array
    {
        return [
            'type' => Arr::random(['movie']),
            'title' => $this->faker()->title(),
            'description' => $this->faker()->text(),
        ];
    }
}
