<?php

declare(strict_types=1);

namespace Modules\Education\Source\Actions;

use Modules\Container\Factories\SourceFactory;
use Modules\Container\Validators\CreateContainerValidator;
use Modules\Education\Source\Repositories\SourceRepository;
use Modules\Education\Source\Structures\SourceModel;
use Modules\Languages\Common\Contracts\LanguageStructure;

final class CreateSource
{
    public function __construct(
        private SourceFactory            $factory,
        private SourceRepository         $repository,
    ) {}

    public function __invoke(LanguageStructure $language, array $attributes): SourceModel
    {
        $source = $this->factory->new($language, $attributes);
        $this->repository->add($source);

        return $source;
    }
}
