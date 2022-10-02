<?php

declare(strict_types=1);

namespace Modules\Personal\User\Tests;

use Core\Base\Helpers\AppHelper;
use Generator;
use Modules\Personal\Auth\Tests\BaseAuthHelper;
use Modules\Personal\User\Actions\CreateUser;

final class UserHelper extends AppHelper
{
    public function generateAttributes(): array
    {
        return [
            'name' => $this->faker()->name(),
        ];
    }

    public function create(int $count = 1, array $overwrite = []): Generator
    {
        /** @var CreateUser $action */
        $action = app(CreateUser::class);

        for ($i = 0; $i < $count; $i++) {
            $attributes = $overwrite
                + $this->generateAttributes()
                + BaseAuthHelper::new()->generateAttributes();

            $user = $action($attributes);

            yield $user;
        }
    }
}
