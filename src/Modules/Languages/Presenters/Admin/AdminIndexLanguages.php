<?php

namespace Modules\Languages\Presenters\Admin;

use Modules\Languages\Factories\ModelLanguageFactory;
use Modules\Languages\Filters\RealLanguageFilter;
use Modules\Languages\Repositories\LanguageRepository;
use Modules\Languages\Resources\IndexLanguageResource;
use stdClass;

class AdminIndexLanguages implements AdminIndexLanguagesPresenter
{
    public function __construct(
        private LanguageRepository   $repository,
        private ModelLanguageFactory $factory,
    ) {}

    public function __invoke(array $attributes)
    {
        $filter = RealLanguageFilter::new($attributes);
        $paginator = $this->repository->all($filter);

        $paginator->through(function (stdClass $data) {
            $context = $this->factory->restore($data);

            return IndexLanguageResource::make($context)->jsonSerialize();
        });

        return $paginator;
    }
}
