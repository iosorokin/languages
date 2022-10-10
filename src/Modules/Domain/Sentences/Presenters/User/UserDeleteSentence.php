<?php

declare(strict_types=1);

namespace Modules\Domain\Sentences\Presenters\User;

use Modules\Domain\Sentences\Actions\DeleteSentence;
use Modules\Personal\Auth\Presenters\GetClientPresenter;

final class UserDeleteSentence implements UserDeleteSentencePresenter
{
    public function __construct(
        private GetClientPresenter $getClient,
        private DeleteSentence $deleteSentence,
    ) {}

    public function __invoke(array $attributes): void
    {
        $client = ($this->getClient)();
        ($this->deleteSentence)($client, $attributes);
    }
}
