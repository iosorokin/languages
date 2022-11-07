<?php

declare(strict_types=1);

namespace Domain\Core\Sentences\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasSentence
{
    public function sentence(): BelongsTo
    {
        return $this->belongsTo(Sentence::class);
    }
}
