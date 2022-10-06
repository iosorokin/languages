<?php

declare(strict_types=1);

namespace Modules\Domain\Sentences\Presenters\User;

use Modules\Domain\Sentences\Actions\CreateSentence;
use Modules\Domain\Sentences\Entities\Sentence;
use Modules\Personal\Auth\Presenters\GetClientPresenter;

final class UserCreateSentence implements UserCreateSentencePresenter
{
    public function __construct(
        private GetClientPresenter $getClient,
        private CreateSentence $createSentence,
    ) {}

    public function __invoke(array $attributes): Sentence
    {
        $client = ($this->getClient)();
        $sentence = ($this->createSentence)($client, $attributes);

        return $sentence;
    }
}
