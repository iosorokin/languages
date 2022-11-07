<?php

declare(strict_types=1);

namespace Domain\Core\Sentences\Presenters\User;

use App\Controllers\Auth\Internal\GetAuthUser;
use Domain\Core\Sentences\Presenters\Mixins\DeleteSentence;

final class UserDeleteSentence
{
    public function __construct(
        private GetAuthUser    $getAuthUser,
        private DeleteSentence $deleteSentence,
    ) {}

    public function __invoke(array $attributes): void
    {
        $auth = ($this->getAuthUser)();
        ($this->deleteSentence)($auth, $attributes);
    }
}
