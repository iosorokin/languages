<?php

declare(strict_types=1);

namespace Modules\Domain\Sentences\Tests;

use Core\Base\Helpers\AppHelper;
use Generator;
use Modules\Domain\Sentences\Presenters\SeedSentence;
use Modules\Domain\Sources\Entities\Source;
use Modules\Internal\Container\Entites\Container;
use Modules\Personal\User\Entities\User;

final class SentenceHelper extends AppHelper
{
    public function generateAttributes(): array
    {
        return [
            'text' => $this->faker()->text(),
        ];
    }

    public function create(User|int $user, Source|int $source, int $count = 1, array $overwrite = []): Generator
    {
        /** @var SeedSentence $presenter */
        $presenter = app()->make(SeedSentence::class);

        for ($i = 0; $i < $count; $i++) {
            $attributes = $this->generateAttributes() + $overwrite;
            $attributes['source_id'] = is_int($source) ? $source : $source->getId();

            yield $presenter($user, $attributes);
        }
    }
}
