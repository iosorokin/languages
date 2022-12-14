<?php

declare(strict_types=1);

namespace WIP\Core\Sentences\Presenters\User;

use Domain\Controllers\Auth\Internal\GetAuthUser;
use WIP\Core\Sentences\Model\Sentence;
use WIP\Core\Sentences\Presenters\Mixins\CreateSentence;

final class UserStoreSentence
{
    public function __construct(
        private GetAuthUser    $getAuthUser,
        private CreateSentence $createSentence,
    ) {}

    public function __invoke(array $attributes): Sentence
    {
        $auth = ($this->getAuthUser)();
        $sentence = ($this->createSentence)($auth, $attributes);

        return $sentence;
    }
}
