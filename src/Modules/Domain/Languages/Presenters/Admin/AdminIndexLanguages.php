<?php

namespace Modules\Domain\Languages\Presenters\Admin;

use Illuminate\Contracts\Pagination\CursorPaginator;
use Modules\Domain\Languages\Filters\RealLanguageFilter;
use Modules\Domain\Languages\Repositories\LanguageRepository;

class AdminIndexLanguages implements AdminIndexLanguagesPresenter
{
    public function __construct(
        private LanguageRepository   $repository,
    ) {}

    public function __invoke(array $attributes): CursorPaginator
    {
        $filter = RealLanguageFilter::new($attributes);
        $paginator = $this->repository->all($filter);

        return $paginator;
    }
}