<?php

declare(strict_types=1);

namespace Modules\Education\Sentences\Tests;

use Core\Base\Helpers\AppHelper;
use Generator;
use Modules\Container\Entites\Container;
use Modules\Education\Sentences\Presenters\SeedSentence;
use Modules\Personal\User\Entities\User;

final class SentenceHelper extends AppHelper
{
    public function generateAttributes(): array
    {
        return [
            'text' => $this->faker()->text(),
        ];
    }

    public function create(User|int $user, Container|int $container, int $count = 1, array $overwrite = []): Generator
    {
        /** @var SeedSentence $presenter */
        $presenter = app()->make(SeedSentence::class);

        for ($i = 0; $i < $count; $i++) {
            $attributes = $this->generateAttributes() + $overwrite;
            $attributes['container_id'] = is_int($container) ? $container : $container->getId();

            yield $presenter($user, $attributes);
        }
    }
}
