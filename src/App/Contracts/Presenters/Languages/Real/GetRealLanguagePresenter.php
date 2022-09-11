<?php

namespace App\Contracts\Presenters\Languages\Real;

use App\Contracts\Structures\Languages\RealLanguageStructure;

interface GetRealLanguagePresenter
{
    public function __invoke(int $id): RealLanguageStructure;
}
