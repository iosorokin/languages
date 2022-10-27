<?php

declare(strict_types=1);

namespace Modules\Core\Languages\Application\Helpers;

use Core\Base\Helpers\AppHelper;
use Generator;
use Illuminate\Support\Str;
use Modules\Core\Languages\Application\Presenters\SeedLanguage;
use Modules\Core\Languages\Infrastructure\Model\Language;
use Modules\Personal\Infrastructure\Repository\EloquentUserModel;

final class LanguageSeedHelper extends AppHelper
{
    public function generateAttributes(): array
    {
        return [
            'name' => Str::random(),
            'native_name' => $this->faker()->unique()->sentence(),
            'code' => $this->faker()->unique()->languageCode(),
        ];
    }

    public function create(EloquentUserModel|int $user, int $count = 1, array $overwrite = []): Generator
    {
        $presenter = $this->presenter();

        for ($i = 0; $i < $count; $i++) {
            $attributes = $overwrite + $this->generateAttributes();

            yield $presenter->create($user, $attributes);
        }
    }

    public function update(EloquentUserModel|int $user, Language|int $language, array $attributes): void
    {
        $presenter = $this->presenter();

        $presenter->update($user, $language, $attributes);
    }

    public function activate(EloquentUserModel|int $user, Language|int $language): void
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
