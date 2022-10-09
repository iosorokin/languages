<?php

declare(strict_types=1);

namespace Modules\Domain\Sentences\Actions;

use Illuminate\Support\Facades\DB;
use Modules\Domain\Sentences\Entities\Sentence;
use Modules\Domain\Sentences\Factories\SentenceFactory;
use Modules\Domain\Sentences\Policies\SentencePolicy;
use Modules\Domain\Sentences\Repositories\SentenceRepository;
use Modules\Domain\Sentences\Validators\CreateSentenceValidator;
use Modules\Internal\Container\Presenters\GetContainerPresenter;
use Modules\Internal\Container\Presenters\Internal\PushElementPresenter;
use Modules\Personal\Auth\Contexts\Client;

final class CreateSentence
{
    public function __construct(
        private CreateSentenceValidator $validator,
        private GetContainerPresenter $getContainer,
        private SentencePolicy $policy,
        private SentenceFactory $factory,
        private SentenceRepository $repository,
        private PushElementPresenter $pushElement,
    ) {}

    public function __invoke(Client $client, array $attributes): Sentence
    {
        $attributes = $this->validator->validate($attributes);
        $container = $this->getContainer->getOrThrowBadRequest($attributes['container_id']);
        $this->policy->canCreate($client, $container);
        $sentence = $this->factory->create($attributes);

        DB::transaction(function () use ($container, $sentence) {
            $this->repository->save($sentence);
            ($this->pushElement)($container, $sentence);
        });

        return $sentence;
    }
}
