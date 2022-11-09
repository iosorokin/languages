<?php

declare(strict_types=1);

namespace Domain\Core\Sentences\Presenters;

use Domain\Core\Sentences\Model\Sentence;
use Domain\Core\Sentences\Presenters\Mixins\CreateSentence;
use Domain\Personal\Account\Queries\GetUser;
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
