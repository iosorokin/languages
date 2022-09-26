<?php

namespace Modules\Languages\Common\Presenters;

use Modules\Languages\Common\Contracts\LanguageStructure;

interface GetLanguagePresenter
{
    public function __invoke(int $id, string $type): LanguageStructure;
}
