<?php

declare(strict_types=1);

namespace Modules\Education\Source\Actions;

use App\Contracts\Structures\Education\SourceStructure;
use App\Contracts\Structures\Languages\LanguageStructure;
use Modules\Education\Source\Factories\SourceFactory;
use Modules\Education\Source\Repositories\SourceRepository;
use Modules\Education\Source\Validators\CreateSourceValidator;

final class CreateSource
{
    public function __construct(
        private CreateSourceValidator $validator,
        private SourceFactory $factory,
        private SourceRepository $repository,
    ) {}

    public function __invoke(LanguageStructure $language, array $attributes): SourceStructure
    {
        $attributes = $this->validator->validate($attributes);
        $this->factory->new();
        $this->repository->add();

    }


}
