<?php

namespace Modules\Domain\Sentences\Presenters\User;

use Modules\Domain\Sentences\Structures\Sentence;

interface UserCreateSentencePresenter
{
    public function __invoke(array $attributes): Sentence;
}
