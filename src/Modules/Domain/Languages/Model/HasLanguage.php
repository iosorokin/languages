<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasLanguage
{
    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }
}
