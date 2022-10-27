<?php

declare(strict_types=1);

namespace Modules\Core\Sentences\Presenters;

use Modules\Core\Sentences\Model\Sentence;
use Modules\Core\Sentences\Presenters\Mixins\CreateSentence;
use Modules\Personal\App\Presenters\Personal\Internal\GetUser;
use Modules\Personal\Infrastructure\Repository\EloquentUserModel;

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
