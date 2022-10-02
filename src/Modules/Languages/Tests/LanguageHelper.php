<?php

declare(strict_types=1);

namespace Modules\Languages\Tests;

use Core\Base\Helpers\AppHelper;
use Faker\Factory;
use Generator;
use Illuminate\Support\Str;
use Modules\Languages\Presenters\Internal\InternalCreateLanguage;

final class LanguageHelper extends AppHelper
{
    public function generateAttributes(): array
    {
        return [
            'name' => Str::random(),
            'native_name' => Factory::create($this->faker()->languageCode())->title(),
            'code' => $this->faker()->languageCode(),
        ];
    }

    public function create(int $count = 1, array $overwrite = []): Generator
    {
        /** @var InternalCreateLanguage $presenter */
        $presenter = app()->get(InternalCreateLanguage::class);

        for ($i = 0; $i < $count; $i++) {
            $attributes = $overwrite + $this->generateAttributes();

            yield $presenter(1, $attributes);
        }
    }
}
