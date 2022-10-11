<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Helpers;

use Core\Base\Helpers\AppHelper;
use Faker\Factory;
use Generator;
use Illuminate\Support\Str;
use Modules\Domain\Languages\Presenters\SeedLanguage;

final class LanguageAppHelper extends AppHelper
{
    public function generateAttributes(): array
    {
        return [
            'name' => Str::random(),
            'native_name' => Factory::create($this->faker()->languageCode())->title(),
            'code' => $this->faker()->languageCode(),
        ];
    }

    public function create(int $userId, int $count = 1, array $overwrite = []): Generator
    {
        /** @var SeedLanguage $presenter */
        $presenter = app()->get(SeedLanguage::class);

        for ($i = 0; $i < $count; $i++) {
            $attributes = $overwrite + $this->generateAttributes();

            yield $presenter($userId, $attributes);
        }
    }
}
