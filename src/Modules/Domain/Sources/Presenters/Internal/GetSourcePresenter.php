<?php

namespace Modules\Core\Sources\Presenters\Internal;

use Modules\Core\Sources\Entities\Source;

interface GetSourcePresenter
{
    public function getOrThrowNotFound(int $id): Source;

    public function getOrThrowBadRequest(int $id): Source;
}
