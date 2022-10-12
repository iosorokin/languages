<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Actions;

use Modules\Domain\Languages\Collections\Languages;
use Modules\Domain\Languages\Filters\LanguageFilter;
use Modules\Domain\Languages\Repositories\LanguageRepository;

final class IndexLanguages
{
    public function __construct(
        private LanguageRepository $repository,
    ) {}

    public function __invoke(array $attributes): Languages
    {
        $filter = LanguageFilter::new($attributes);
        $languages = $this->repository->all($filter);

        return $languages;
    }
}
