<?php

declare(strict_types=1);

namespace Domain\Core\Sentences\Presenters\User;

use App\Controllers\Auth\Internal\GetAuthUser;
use Domain\Core\Sentences\Model\Sentence;
use Domain\Core\Sentences\Presenters\Mixins\CreateSentence;

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
