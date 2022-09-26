<?php

declare(strict_types=1);

namespace Modules\Education\Sentences\Presenters;

use Modules\Education\Sentences\Factories\SentenceFactory;
use Modules\Education\Sentences\Repositories\SentenceRepository;
use Modules\Education\Sentences\Structures\SentenceStructure;
use Modules\Education\Sentences\Validators\CreateSentenceValidator;

final class CreateSentence implements CreateSentencePresenter
{
    public function __construct(
        private CreateSentenceValidator $validator,
        private SentenceFactory $factory,
        private SentenceRepository $repository,
    ) {}

    public function __invoke(array $attributes): SentenceStructure
    {
        $attributes = $this->validator->validate($attributes);
        $sentence = $this->factory->new($attributes);
        $this->repository->save($sentence);

        return $sentence;
    }
}
