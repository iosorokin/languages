<?php

declare(strict_types=1);

namespace Modules\Education\Dictionary\Tests;

use Core\Base\Helpers\AppHelper;
use Generator;
use Modules\Education\Dictionary\Presenters\SeedDictionary;
use Modules\Personal\User\Entities\User;

final class DictionaryHelper extends AppHelper
{
    public function generateAttributes(): array
    {
        return [
            'title' => $this->faker()->title(),
            'description' => $this->faker()->text(),
        ];
    }

    public function create(User|int $user, int $languageId, int $count = 1, array $overwrite = []): Generator
    {
        /** @var SeedDictionary $presenter */
        $presenter = app(SeedDictionary::class);
        $overwrite['language_id'] = $languageId;

        for ($i = 0; $i < $count; $i++) {
            $attributes = $this->generateAttributes() + $overwrite;
            $dictionary = $presenter($user, $attributes);

            yield $dictionary;
        }
    }
}
