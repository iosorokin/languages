<?php

namespace Modules\Domain\Sources\Presenters\Internal;

use Modules\Domain\Sources\Entities\Source;

interface GetSourcePresenter
{
    public function getOrThrowNotFound(int $id): Source;

    public function getOrThrowBadRequest(int $id): Source;
}
