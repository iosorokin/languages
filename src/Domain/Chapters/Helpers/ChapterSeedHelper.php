<?php

declare(strict_types=1);

namespace Domain\Chapters\Helpers;

use App\Base\Helpers\AppHelper;
use Generator;
use Domain\Chapters\Presenters\SeedChapter;
use Domain\Sources\Structures\Source;
use Domain\Internal\Container\Helpers\ContainerSeedHelper;

final class ChapterSeedHelper extends AppHelper
{
    public function create(Source|int $source, int $count, array $overwrite = []): Generator
    {
        for ($i = 0; $i < $count; $i++) {
            $attributes = ContainerSeedHelper::new()->generateAttributes() + $overwrite;
            $attributes['source_id'] = is_int($source) ? $source : $source->getId();
            /** @var SeedChapter $presenter */
            $presenter = app()->make(SeedChapter::class);

            yield $presenter($attributes);
        }
    }
}
