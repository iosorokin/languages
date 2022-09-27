<?php

declare(strict_types=1);

namespace Modules\Education\Sentences\Presenters;

use Modules\Container\Presenters\Policies\CanEditContainerPresenter;
use Modules\Education\Sentences\Factories\SentenceDtoFactory;
use Modules\Education\Sentences\Factories\SentenceFactory;
use Modules\Education\Sentences\Repositories\SentenceRepository;
use Modules\Education\Sentences\Structures\SentenceStructure;

final class CreateSentence implements CreateSentencePresenter
{
    public function __construct(
        private SentenceDtoFactory        $dtoFactory,
        private CanEditContainerPresenter $canEditContainer,
        private SentenceFactory           $factory,
        private SentenceRepository        $repository,
    ) {}

    public function __invoke(array $attributes): SentenceStructure
    {
        $dto = $this->dtoFactory->create($attributes);
        $container = ($this->canEditContainer)($dto->getContainerId());
        $sentence = $this->factory->new($container, $dto);
        $this->repository->save($sentence);

        return $sentence;
    }
}
