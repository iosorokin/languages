<?php

declare(strict_types=1);

namespace WIP\Core\Sentences\Tests;

use App\Base\Helpers\ModuleHelper;
use Generator;
use Infrastructure\Database\Repositories\Personal\Eloquent\EloquentUserModel;
use WIP\Core\Sentences\Presenters\SeedSentence;
use WIP\Core\Sources\Structures\Source;

final class SentenceHelper extends ModuleHelper
{
    public function generateAttributes(): array
    {
        return [
            'text' => $this->faker()->text(),
        ];
    }

    public function create(EloquentUserModel|int $user, Source|int $source, int $count = 1, array $overwrite = []): Generator
    {
        /** @var SeedSentence $presenter */
        $presenter = app()->make(SeedSentence::class);
        $overwrite['source_id'] = is_int($source) ? $source : $source->getId();

        for ($i = 0; $i < $count; $i++) {
            $attributes = $this->generateAttributes() + $overwrite;
            yield $presenter($user, $attributes);
        }
    }
}
