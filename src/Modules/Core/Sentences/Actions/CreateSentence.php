<?php

declare(strict_types=1);

namespace Modules\Core\Sentences\Actions;

use Illuminate\Support\Facades\DB;
use Modules\Container\Presenters\GetContainerPresenter;
use Modules\Container\Presenters\Internal\PushElementPresenter;
use Modules\Core\Sentences\Entities\Sentence;
use Modules\Core\Sentences\Factories\SentenceFactory;
use Modules\Core\Sentences\Policies\SentencePolicy;
use Modules\Core\Sentences\Repositories\SentenceRepository;
use Modules\Core\Sentences\Validators\CreateSentenceValidator;
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