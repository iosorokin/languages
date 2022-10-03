<?php

declare(strict_types=1);

namespace Modules\Education\Sentences\Presenters\User;

use Modules\Container\Policies\CanEditContainerPresenter;
use Modules\Education\Sentences\Entities\Sentence;
use Modules\Education\Sentences\Factories\ModelSentenceFactory;
use Modules\Education\Sentences\Factories\SentenceDtoFactory;
use Modules\Education\Sentences\Repositories\SentenceRepository;

final class UserCreateSentence implements UserCreateSentencePresenter
{
    public function __construct(
        private SentenceDtoFactory        $dtoFactory,
        private CanEditContainerPresenter $canEditContainer,
        private ModelSentenceFactory      $factory,
        private SentenceRepository        $repository,
    ) {}

    public function __invoke(array $attributes): Sentence
    {
        $dto = $this->dtoFactory->create($attributes);
        $container = ($this->canEditContainer)($dto->getContainerId());
        $sentence = $this->factory->new($container, $dto);
        $this->repository->save($sentence);

        return $sentence;
    }
}
