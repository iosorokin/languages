<?php

namespace Modules\Languages\Real\Actions;

use App\Contracts\Structures\Languages\RealLanguageStructure;
use Illuminate\Support\Collection;
use Modules\Languages\Real\Filters\RealLanguageFilter;
use Modules\Languages\Real\Repositories\RealLanguageRepository;

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
