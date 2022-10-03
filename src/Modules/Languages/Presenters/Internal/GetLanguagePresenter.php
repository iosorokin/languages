<?php

declare(strict_types=1);

namespace Modules\Languages\Presenters\Internal;

use Modules\Languages\Entity\Language;

interface GetLanguagePresenter
{
    public function getOrThrowNotFound(int $id): Language;

    public function getOrThrowBadRequest(int $id): Language;
}
