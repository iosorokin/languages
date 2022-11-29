<?php

declare(strict_types=1);

namespace WIP\Core\Sentences\Presenters;

use Core\Infrastructure\Database\Repositories\Eloquent\Personal\Eloquent\EloquentUserModel;
use WIP\Core\Sentences\Model\Sentence;
use WIP\Core\Sentences\Presenters\Mixins\CreateSentence;
use WIP\Personal\Account\Queries\GetUser;

final class SeedSentence
{
    public function __construct(
        private GetUser $getUser,
        private CreateSentence $createSentence,
    ) {}

    public function __invoke(EloquentUserModel|int $user, array $attributes = []): Sentence
    {
        $user = is_int($user) ? ($this->getUser)($user) : $user;

        return ($this->createSentence)($user, $attributes);
    }
}
