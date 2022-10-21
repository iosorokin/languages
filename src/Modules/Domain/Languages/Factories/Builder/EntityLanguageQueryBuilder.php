<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Factories\Builder;

use Modules\Personal\User\Structures\User;

final class EntityLanguageQueryBuilder extends BaseLanguageQueryBuilder
{
    public function withUserFavorite(int|User $user): self
    {

    }

    public function whereUserFavorite(int|User $user): self
    {
        // TODO: Implement whereUserFavorite() method.
    }
}
