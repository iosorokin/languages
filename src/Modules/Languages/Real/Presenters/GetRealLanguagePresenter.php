<?php

namespace Modules\Languages\Real\Presenters;

use Modules\Languages\Real\Structures\RealLanguageStructure;

interface GetRealLanguagePresenter
{
    public function __invoke(int $id): RealLanguageStructure;
}
