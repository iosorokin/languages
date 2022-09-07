<?php

namespace Modules\Languages\Real\Presenters;

use App\Contracts\Presenters\Languages\Real\IndexRealLanguagesPresenter;
use Illuminate\Support\Collection;
use Modules\Languages\Real\Factories\RealLanguageFactory;
use Modules\Languages\Real\Filters\RealLanguageFilter;
use Modules\Languages\Real\Repositories\RealLanguageRepository;
use Modules\Languages\Real\Resources\IndexRealLanguageResource;
use stdClass;

class IndexRealLanguages implements IndexRealLanguagesPresenter
{
    public function __construct(
        private RealLanguageRepository $repository,
        private RealLanguageFactory $factory,
    ) {}

    public function __invoke(array $attributes)
    {
        $filter = RealLanguageFilter::new($attributes);
        $paginator = $this->repository->all($filter);

        $paginator->through(function (stdClass $data) {
            $context = $this->factory->restore($data);

            return IndexRealLanguageResource::make($context)->jsonSerialize();
        });

        return $paginator;
    }
}
