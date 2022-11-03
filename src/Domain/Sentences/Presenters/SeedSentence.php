<?php

declare(strict_types=1);

namespace Domain\Sentences\Presenters;

use Domain\Personal\Queries\GetUser;
use Domain\Sentences\Model\Sentence;
use Domain\Sentences\Presenters\Mixins\CreateSentence;
use Infrastructure\Database\Repositories\Personal\Eloquent\EloquentUserModel;

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
