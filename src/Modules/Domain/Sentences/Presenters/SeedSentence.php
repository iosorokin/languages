<?php

declare(strict_types=1);

namespace Modules\Domain\Sentences\Presenters;

use Modules\Domain\Sentences\Actions\CreateSentence;
use Modules\Domain\Sentences\Entities\Sentence;
use Modules\Personal\Auth\Presenters\GetClientPresenter;
use Modules\Personal\User\Entities\User;
use Modules\Personal\User\Presenters\Internal\GetUserPresenter;

final class SeedSentence
{
    public function __construct(
        private GetUserPresenter $getUser,
        private GetClientPresenter $getClient,
        private CreateSentence $createSentence,
    ) {}

    public function __invoke(User|int $user, array $attributes = []): Sentence
    {
        $user = is_int($user) ? ($this->getUser)($user) : $user;
        $client = ($this->getClient)($user);

        return ($this->createSentence)($client, $attributes);
    }
}
