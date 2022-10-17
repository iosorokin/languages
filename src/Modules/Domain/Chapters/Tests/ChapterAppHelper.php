<?php

declare(strict_types=1);

namespace Modules\Domain\Chapters\Tests;

use Core\Base\Helpers\AppHelper;
use Generator;
use Modules\Domain\Chapters\Presenters\UserStoreChapterPresenter;
use Modules\Domain\Sources\Structures\Source;
use Modules\Internal\Container\Helpers\ContainerAppHelper;

final class ChapterAppHelper extends AppHelper
{
    public function create(Source|int $source, int $count, array $overwrite = []): Generator
    {
        for ($i = 0; $i < $count; $i++) {
            $attributes = ContainerAppHelper::new()->generateAttributes() + $overwrite;
            $attributes['source_id'] = is_int($source) ? $source : $source->getId();
            /** @var UserStoreChapterPresenter $presenter */
            $presenter = app()->make(UserStoreChapterPresenter::class);

            yield $presenter($attributes);
        }
    }
}
