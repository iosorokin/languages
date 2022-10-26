<?php

declare(strict_types=1);

namespace Modules\Domain\Sentences\Presenters;

use App\Controll\Personal\Internal\GetUser;
use App\Database\Personal\EloquentUserModel;
use Modules\Domain\Sentences\Model\Sentence;
use Modules\Domain\Sentences\Presenters\Mixins\CreateSentence;

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
