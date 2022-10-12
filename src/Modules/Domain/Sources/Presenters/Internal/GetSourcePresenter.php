<?php

namespace Modules\Domain\Sources\Presenters\Internal;

use Modules\Domain\Sources\Structures\Source;

interface GetSourcePresenter
{
    public function getOrThrowNotFound(int $id): Source;

    public function getOrThrowBadRequest(int $id): Source;

    public function getOrThrowException(int $id): Source;
}
