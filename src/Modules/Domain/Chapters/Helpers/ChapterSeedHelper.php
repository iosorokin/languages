<?php

declare(strict_types=1);

namespace Modules\Domain\Chapters\Helpers;

use Core\Base\Helpers\AppHelper;
use Generator;
use Modules\Domain\Chapters\Presenters\SeedChapter;
use Modules\Domain\Chapters\Presenters\User\UserStoreChapter;
use Modules\Domain\Sources\Structures\Source;
use Modules\Internal\Container\Helpers\ContainerSeedHelper;

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
