<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Helpers;

use Core\Base\Helpers\AppHelper;
use Faker\Factory;
use Generator;
use Illuminate\Support\Str;
use Modules\Domain\Languages\Presenters\SeedLanguage;
use Modules\Domain\Languages\Structures\Language;
use Modules\Personal\User\Structures\User;

final class LanguageSeedHelper extends AppHelper
{
    public function generateAttributes(): array
    {
        return [
            'name' => Str::random(),
            'native_name' => Factory::create($this->faker()->languageCode())->title(),
            'code' => $this->faker()->languageCode(),
        ];
    }

    public function create(User|int $user, int $count = 1, array $overwrite = []): Generator
    {
        $presenter = $this->presenter();

        for ($i = 0; $i < $count; $i++) {
            $attributes = $overwrite + $this->generateAttributes();

            yield $presenter->create($user, $attributes);
        }
    }

    public function update(User|int $user, Language|int $language, array $attributes): void
    {
        $presenter = $this->presenter();

        $presenter->update($user, $language, $attributes);
    }

    public function activate(User|int $user, Language|int $language): void
    {
        $this->update($user, $language, [
            'is_active' => true
        ]);
    }

    private function presenter(): SeedLanguage
    {
        return app()->make(SeedLanguage::class);
    }
}
