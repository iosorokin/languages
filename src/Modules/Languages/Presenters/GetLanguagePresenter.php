<?php

declare(strict_types=1);

namespace Modules\Languages\Presenters;

use Modules\Languages\Entity\Language;

interface GetLanguagePresenter
{
    public function __invoke(int $id): Language;
}
