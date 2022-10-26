<?php

declare(strict_types=1);

namespace Modules\Domain\Sources\Helpers;

use App\Database\Personal\EloquentUserModel;
use Core\Base\Helpers\AppHelper;
use Generator;
use Illuminate\Support\Arr;
use Modules\Domain\Sources\Presenters\SeedSource;

final class SourceSeedHelper extends AppHelper
{
    public function generateAttributes(): array
    {
        return [
            'type' => Arr::random(['movie', 'song']),
            'title' => $this->faker()->title(),
            'description' => $this->faker()->text(),
        ];
    }

    public function create(EloquentUserModel|int $user, int $languageId, int $count = 1, array $overwrite = []): Generator
    {
        /** @var SeedSource $seedSource */
        $seedSource = app()->make(SeedSource::class);

        for ($i = 0; $i < $count; $i++) {
            $attributes = $overwrite + $this->generateAttributes();
            $source = $seedSource($user, $languageId, $attributes);

            yield $source;
        }
    }
}
