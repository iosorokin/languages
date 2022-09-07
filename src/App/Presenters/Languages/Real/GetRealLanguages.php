<?php

namespace App\Presenters\Languages\Real;

use App\Helpers\Pagination\CursorPaginator;
use Illuminate\Support\Arr;
use Modules\Languages\Real\Actions\GetRealLanguages as GetRealLanguagesAction;
use Modules\Languages\Real\Filters\RealLanguageFilter;

class GetRealLanguages
{
    public function __construct(
        private GetRealLanguagesAction $getRealLanguages
    ) {}

    public function __invoke(array $attributes)
    {
        $filter = $this->createFilter($attributes);
        $collection = ($this->getRealLanguages)($filter);

        return $collection;
    }

    private function createFilter(array $attributes): RealLanguageFilter
    {
        return new RealLanguageFilter(
            paginator: CursorPaginator::new($attributes),
            name: Arr::get($attributes, 'name'),
            nativeName: Arr::get($attributes, 'nativeName'),
            code: Arr::get($attributes, 'code'),
        );
    }
}
