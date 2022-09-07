<?php

namespace Modules\Languages\Real\Actions;

use App\Repositories\Lanugages\RealLanguageRepository;
use App\Structures\Languages\RealLanguageStructure;
use Illuminate\Support\Collection;
use Modules\Languages\Real\Filters\RealLanguageFilter;

class GetRealLanguages
{
    public function __construct(
        private RealLanguageRepository $repository,
    ) {}

    /**
     * @param RealLanguageFilter $filter
     * @return Collection<RealLanguageStructure>
     */
    public function __invoke(RealLanguageFilter $filter): Collection
    {
        return $this->repository->get($filter);
    }
}
