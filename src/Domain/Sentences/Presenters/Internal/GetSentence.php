<?php

declare(strict_types=1);

namespace Domain\Sentences\Presenters\Internal;

use Illuminate\Validation\ValidationException;
use Domain\Sentences\Model\Sentence;

final class GetSentence
{
    public function get(int $id): ?Sentence
    {
        return Sentence::find($id);
    }

    public function getOrThrowBadRequest(int $id): Sentence
    {
        $sentence = $this->get($id);
        if (! $sentence) {
            throw ValidationException::withMessages([
                'sentence_id' => sprintf('Sentence with id %d not found', $id)
            ]);
        }

        return $sentence;
    }
}
