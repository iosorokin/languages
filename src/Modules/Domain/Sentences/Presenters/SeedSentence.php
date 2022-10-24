<?php

declare(strict_types=1);

namespace Modules\Domain\Sentences\Presenters;

use Modules\Domain\Sentences\Presenters\Mixins\CreateSentence;
use Modules\Domain\Sentences\Model\Sentence;
use Modules\Personal\User\Model\User;
use Modules\Personal\User\Presenters\Internal\GetUser;

final class SeedSentence
{
    public function __construct(
        private GetUser $getUser,
        private CreateSentence $createSentence,
    ) {}

    public function __invoke(User|int $user, array $attributes = []): Sentence
    {
        $user = is_int($user) ? ($this->getUser)($user) : $user;

        return ($this->createSentence)($user, $attributes);
    }
}
