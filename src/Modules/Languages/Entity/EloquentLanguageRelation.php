<?php

declare(strict_types=1);

namespace Modules\Languages\Entity;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait EloquentLanguageRelation
{
    public function language(): BelongsTo
    {
        return $this->belongsTo(LanguageModel::class);
    }

    public function setLanguage(Language $language): self
    {
        $this->language()->associate($language);

        return $this;
    }

    public function getLanguage(): Language
    {
        return $this->language;
    }
}