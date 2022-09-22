<?php

namespace App\Contracts\Presenters\Languages\Real;

use App\Contracts\Structures\RealLanguageStructure;

interface GetRealLanguagePresenter
{
    public function __invoke(int $id): RealLanguageStructure;
}
