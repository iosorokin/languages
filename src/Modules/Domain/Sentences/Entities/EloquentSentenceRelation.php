<?php

declare(strict_types=1);

namespace Modules\Domain\Sentences\Entities;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait EloquentSentenceRelation
{
    public function sentence(): BelongsTo
    {
        return $this->belongsTo(SentenceModel::class);
    }

    public function setSentence(Sentence $sentence): self
    {
        $this->sentence()->associate($sentence);

        return $this;
    }

    public function getSentenceId(): int
    {
        return $this->sentence_id;
    }

    public function getSentence(): Sentence
    {
        return $this->sentence;
    }
}
