<?php

declare(strict_types=1);

namespace Domain\Core\Sentences\Presenters\Internal;

use Domain\Core\Sentences\Model\Sentence;
use Illuminate\Validation\ValidationException;

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
