<?php

declare(strict_types=1);

namespace Modules\Domain\Sentences\Actions;

use Exception;
use Illuminate\Support\Facades\DB;
use Modules\Domain\Chapters\Presenters\GetChapterPresenter;
use Modules\Domain\Sentences\Structures\Sentence;
use Modules\Domain\Sentences\Factories\SentenceFactory;
use Modules\Domain\Sentences\Policies\SentencePolicy;
use Modules\Domain\Sentences\Repositories\SentenceRepository;
use Modules\Domain\Sentences\Validators\CreateSentenceValidator;
use Modules\Domain\Sources\Presenters\Internal\GetSourcePresenter;
use Modules\Internal\Container\Presenters\Internal\InitWrapperContainerPresenter;
use Modules\Internal\Container\Presenters\Internal\PushElementPresenter;
use Modules\Personal\Auth\Contexts\Client;

final class CreateSentence
{
    public function __construct(
        private CreateSentenceValidator $validator,
        private GetSourcePresenter $getSource,
        private GetChapterPresenter $getChapter,
        private SentencePolicy $policy,
        private SentenceFactory $factory,
        private SentenceRepository $repository,
        private PushElementPresenter $pushElement,
        private InitWrapperContainerPresenter $initWrapperContainer,
    ) {}

    public function __invoke(Client $client, array $attributes): Sentence
    {
        $attributes = $this->validator->validate($attributes);
        $source = $this->getSource->getOrThrowBadRequest($attributes['source_id']);
        $chapter = isset($attributes['chapter_id']) ? $this->getChapter->get($attributes['chapter_id']) : null;
        $this->policy->canCreate($client, $source);
        $sentence = $this->factory->create($source, $attributes);

        DB::transaction(function () use ($source, $chapter, $sentence) {
            if ($chapter) {
                $this->repository->save($sentence);
                ($this->pushElement)($chapter, $sentence);
            } else {
                $wrapper = $source->getContainer();
                if (! $wrapper) {
                    $wrapper = ($this->initWrapperContainer)($source);
                }

                if (! $wrapper->getType()->isWrapper()) {
                    throw new Exception('Контейнер не является обёрткой');
                }

                $this->repository->save($sentence);
                ($this->pushElement)($wrapper, $sentence);
            }
        });

        return $sentence;
    }
}
