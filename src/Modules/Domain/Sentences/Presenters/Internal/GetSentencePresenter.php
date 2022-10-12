<?php

namespace Modules\Domain\Sentences\Presenters\Internal;

use Modules\Domain\Sentences\Structures\Sentence;

interface GetSentencePresenter
{
    public function getOrThrowBadRequest(int $id): Sentence;
}
