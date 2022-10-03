<?php

namespace Modules\Education\Source\Presenters\Internal;

use Modules\Education\Source\Entity\Source;

interface GetSourcePresenter
{
    public function getOrThrowNotFound(int $id): Source;

    public function getOrThrowBadRequest(int $id): Source;
}
