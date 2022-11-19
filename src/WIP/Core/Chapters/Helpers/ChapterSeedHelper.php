<?php

declare(strict_types=1);

namespace WIP\Core\Chapters\Helpers;

use App\Base\Test\Helpers\ModuleHelper;
use Generator;
use WIP\Core\Chapters\Presenters\SeedChapter;
use WIP\Core\Sources\Structures\Source;
use WIP\Internal\Container\Helpers\ContainerSeedHelper;

final class ChapterSeedHelper extends ModuleHelper
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
