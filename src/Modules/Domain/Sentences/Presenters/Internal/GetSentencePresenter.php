<?php

namespace Modules\Domain\Sentences\Presenters\Internal;

use Modules\Domain\Sentences\Entities\Sentence;

interface GetSentencePresenter
{
    public function getOrThrowBadRequest(int $id): Sentence;
}
