<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Presenters\Internal;

use Modules\Domain\Languages\Structures\Language;

interface GetLanguagePresenter
{
    public function getOrThrowNotFound(int $id): Language;

    public function getOrThrowBadRequest(int $id): Language;
}
