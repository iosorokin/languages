<?php

declare(strict_types=1);

namespace Modules\Domain\Sources\Tests;

use Core\Base\Helpers\AppHelper;
use Generator;
use Illuminate\Support\Arr;
use Modules\Domain\Sources\Presenters\SeedSource;
use Modules\Personal\User\Entities\User;

final class SourceHelper extends AppHelper
{
    public function generateAttributes(): array
    {
        return [
            'type' => Arr::random(['movie', 'song']),
            'title' => $this->faker()->title(),
            'description' => $this->faker()->text(),
        ];
    }

    public function create(User|int $user, int $languageId, int $count = 1, array $overwrite = []): Generator
    {
        $overwrite['language_id'] = $languageId;
        /** @var SeedSource $createSource */
        $createSource = app()->make(SeedSource::class);

        for ($i = 0; $i < $count; $i++) {
            $attributes = $overwrite + $this->generateAttributes();
            $source = $createSource($user, $attributes);

            yield $source;
        }
    }
}