<?php

declare(strict_types=1);

namespace Modules\Domain\Sentences\Presenters\Internal;

use Illuminate\Validation\ValidationException;
use Modules\Domain\Sentences\Entities\Sentence;
use Modules\Domain\Sentences\Repositories\SentenceRepository;

final class GetSentence implements GetSentencePresenter
{
    public function __construct(
        private SentenceRepository $repository,
    ) {}

    public function getOrThrowBadRequest(int $id): Sentence
    {
        $sentence = $this->repository->get($id);
        if (! $sentence) {
            throw ValidationException::withMessages([
                'sentence_id' => sprintf('Sentence with id %d not found', $id)
            ]);
        }

        return $sentence;
    }
}
