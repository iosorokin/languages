<?php

namespace Modules\Languages\Real\Presenters;

use App\Contracts\Presenters\Languages\Real\IndexRealLanguagesPresenter;
use App\Helpers\Pagination\CursorPaginator;
use Illuminate\Support\Arr;
use Modules\Languages\Real\Actions\GetRealLanguages;
use Modules\Languages\Real\Filters\RealLanguageFilter;

class IndexRealLanguages implements IndexRealLanguagesPresenter
{
    public function __construct(
        private GetRealLanguages $getRealLanguages
    ) {}

    public function __invoke(array $attributes)
    {
        $filter = RealLanguageFilter::new($attributes);
        $collection = ($this->getRealLanguages)($filter);

        return $collection;
    }
}
