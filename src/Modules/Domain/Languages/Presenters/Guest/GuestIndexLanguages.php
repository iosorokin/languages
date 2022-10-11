<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Presenters\Guest;

use Illuminate\Support\Collection;
use Modules\Domain\Languages\Filters\LanguageFilter;
use Modules\Domain\Languages\Repositories\LanguageRepository;

final class GuestIndexLanguages implements GuestIndexLanguagesPresenter
{
    public function __construct(
        private LanguageRepository $repository,
    ) {}

    public function __invoke(array $attributes): Collection
    {
        $filter = LanguageFilter::new($attributes);
        $languages = $this->repository->all($filter);

        return $languages;
    }
}
