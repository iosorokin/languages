<?php

namespace App\Repositories\Lanugages;

use App\Structures\Languages\RealLanguageStructure;
use Illuminate\Support\Collection;
use Modules\Languages\Real\Filters\RealLanguageFilter;

interface RealLanguageRepository
{
    public function add(RealLanguageStructure $language): void;

    public function get(RealLanguageFilter $filter): Collection;
}
