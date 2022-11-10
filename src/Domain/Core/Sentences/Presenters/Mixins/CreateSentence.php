<?php

declare(strict_types=1);

namespace Domain\Core\Sentences\Presenters\Mixins;

use Domain\Core\Chapters\Presenters\Internal\GetChapter;
use Domain\Core\Sentences\Factories\SentenceFactory;
use Domain\Core\Sentences\Model\Sentence;
use Domain\Core\Sentences\Policies\SentencePolicy;
use Domain\Core\Sentences\Validators\CreateSentenceValidator;
use Domain\Core\Sources\Presenters\Internal\GetSource;
use Domain\Internal\Container\Presenters\Internal\InitWrapperContainer;
use Domain\Internal\Container\Presenters\Internal\PushElement;
use Exception;
use Illuminate\Support\Facades\DB;
use Infrastructure\Database\Repositories\Personal\Eloquent\EloquentUserModel;

final class CreateSentence
{
    public function __construct(
        private CreateSentenceValidator $validator,
        private GetSource $getSource,
        private GetChapter $getChapter,
        private SentencePolicy $policy,
        private SentenceFactory $factory,
        private PushElement $pushElement,
        private InitWrapperContainer $initWrapperContainer,
    ) {}

    public function __invoke(EloquentUserModel $user, array $attributes): Sentence
    {
        $attributes = $this->validator->validate($attributes);
        $source = $this->getSource->getOrThrowBadRequest($attributes['source_id']);
        $chapter = isset($attributes['chapter_id']) ? $this->getChapter->get($attributes['chapter_id']) : null;
        $this->policy->canCreate($user, $source);
        $sentence = $this->factory->create($source, $attributes);

        DB::transaction(function () use ($source, $chapter, $sentence) {
            $sentence->save();

            if ($chapter) {
                ($this->pushElement)($chapter, $sentence);
            } else {
                $wrapper = $source->container;
                if (! $wrapper) {
                    $wrapper = ($this->initWrapperContainer)($source);
                }

                if (! $wrapper->type->isWrapper()) {
                    throw new Exception('Контейнер не является обёрткой');
                }

                ($this->pushElement)($wrapper, $sentence);
            }
        });

        return $sentence;
    }
}