<?php

declare(strict_types=1);

namespace Modules\Container\Actions;

use Modules\Container\Factories\SourceFactory;
use Modules\Container\Validators\CreateSourceValidator;
use Modules\Education\Source\Repositories\SourceRepository;
use Modules\Education\Source\Structures\SourceModel;
use Modules\Languages\Common\Contracts\LanguageStructure;

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
