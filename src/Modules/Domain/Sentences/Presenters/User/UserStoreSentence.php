<?php

declare(strict_types=1);

namespace Modules\Domain\Sentences\Presenters\User;

use Modules\Domain\Sentences\Presenters\Mixins\CreateSentence;
use Modules\Domain\Sentences\Model\Sentence;
use Modules\Personal\Auth\Presenters\Internal\GetAuthUser;

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
