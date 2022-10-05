<?php

declare(strict_types=1);

namespace Modules\Education\Rules\Tests;

use Core\Base\Helpers\AppHelper;
use Generator;
use Modules\Education\Rules\Presenters\SeedRule;
use Modules\Personal\User\Entities\User;

final class RuleHelper extends AppHelper
{
    public function generateAttributes(): array
    {
        return [
            'title' => $this->faker()->title(),
            'description' => $this->faker()->text(),
        ];
    }

    public function create(User $user, int $languageId, int $count = 1, array $overwrite = []): Generator
    {
        $overwrite['language_id'] = $languageId;
        /** @var SeedRule $createRule */
        $createRule = app()->make(SeedRule::class);

        for ($i = 0; $i < $count; $i++) {
            $attributes = $overwrite + $this->generateAttributes();
            $source = $createRule($user, $attributes);

            yield $source;
        }
    }
}
