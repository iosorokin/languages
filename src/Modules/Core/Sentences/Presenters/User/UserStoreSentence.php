<?php

declare(strict_types=1);

namespace Modules\Core\Sentences\Presenters\User;

use App\Controllers\Auth\Internal\GetAuthUser;
use Modules\Core\Sentences\Model\Sentence;
use Modules\Core\Sentences\Presenters\Mixins\CreateSentence;

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
