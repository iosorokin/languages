<?php

declare(strict_types=1);

namespace Modules\Languages\Real\Tests;

use Core\Test\Helpers\AppHelper;
use Core\Test\Helpers\Helper;
use Faker\Factory;
use Generator;
use Illuminate\Support\Str;
use Modules\Languages\Real\Presenters\CreateRealLanguage;

final class RealLanguageHelper extends AppHelper
{
    public function generateAttributes(): array
    {
        return [
            'name' => Str::random(),
            'native_name' => Factory::create($this->faker()->languageCode())->title(),
            'code' => $this->faker()->languageCode(),
        ];
    }

    public function create(int $count = 1): Generator
    {
        $presenter = app()->get(CreateRealLanguage::class);

        for ($i = 0; $i < $count; $i++) {
            $attributes = $this->generateAttributes();

            yield $presenter($attributes);
        }
    }
}
