<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Factories\Structure;

use Illuminate\Contracts\Pagination\CursorPaginator as LaravelCursorPaginator;
use Modules\Domain\Languages\Collections\Languages;
use Modules\Domain\Languages\Structures\Language;
use Modules\Domain\Languages\Structures\LanguageEntity;
use stdClass;

final class EntityLanguageStructureFactory extends BaseLanguageStructureFactory
{
    protected function createStructure(): Language
    {
        return new LanguageEntity();
    }

    public function collection(LaravelCursorPaginator $laravelPaginator): Languages
    {
        $languages = parent::collection($laravelPaginator);
        $languages->lazyWrapper(function (stdClass $item) {
            return $this->restore((array) $item);
        });

        return $languages;
    }
}
