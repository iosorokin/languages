<?php

namespace Modules\Domain\Sentences\Presenters\User;

use Modules\Domain\Sentences\Entities\Sentence;

interface UserCreateSentencePresenter
{
    public function __invoke(array $attributes): Sentence;
}
