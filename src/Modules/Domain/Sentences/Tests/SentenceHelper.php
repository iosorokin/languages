<?php

declare(strict_types=1);

namespace Modules\Domain\Sentences\Tests;

use Core\Base\Helpers\AppHelper;
use Generator;
use Modules\Domain\Sentences\Presenters\SeedSentence;
use Modules\Domain\Sources\Structures\Source;
use Modules\Internal\Container\Model\Container;
use Modules\Personal\User\Model\User;

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
        $overwrite['source_id'] = is_int($source) ? $source : $source->getId();

        for ($i = 0; $i < $count; $i++) {
            $attributes = $this->generateAttributes() + $overwrite;
            yield $presenter($user, $attributes);
        }
    }
}
