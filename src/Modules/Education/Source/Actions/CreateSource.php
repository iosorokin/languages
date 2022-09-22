<?php

declare(strict_types=1);

namespace Modules\Education\Source\Actions;

use Modules\Education\Source\Factories\SourceFactory;
use Modules\Education\Source\Repositories\SourceRepository;
use Modules\Education\Source\Structures\SourceModel;
use Modules\Education\Source\Validators\CreateSourceValidator;
use Modules\Languages\LanguageStructure;

final class CreateSource
{
    public function __construct(
        private CreateSourceValidator $validator,
        private SourceFactory $factory,
        private SourceRepository $repository,
    ) {}

    public function __invoke(LanguageStructure $language, array $attributes): SourceModel
    {
        $attributes = $this->validator->validate($attributes);
        $source = $this->factory->new($language, $attributes);
        $this->repository->add($source);

        return $source;
    }
}
