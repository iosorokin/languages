<?php

namespace Modules\Languages\Real\Presenters;

use App\Contracts\Presenters\Languages\Real\ShowRealLanguagePresenter;
use Modules\Languages\Real\Factories\RealLanguageFactory;
use Modules\Languages\Real\Repositories\RealLanguageRepository;
use Modules\Languages\Real\Resources\RealLanguageResource;

class ShowRealLanguage implements ShowRealLanguagePresenter
{
    public function __construct(
        private RealLanguageRepository $repository,
        private RealLanguageFactory $factory,
    ) {}

    public function __invoke(int $id)
    {
        $structure = $this->repository->get($id);
        $context = $this->factory->restore($structure);

        return RealLanguageResource::make($context)->jsonSerialize();
    }
}
