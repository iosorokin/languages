<?php

namespace Modules\Education\Source\Structures;

use App\Contracts\Structures\LanguageStructure;
use App\Contracts\Structures\SourceStructure;
use App\Extensions\Assert;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

final class SourceModel extends Model implements SourceStructure
{
    protected $table = 'sources';

    private function language(): MorphTo
    {
        return $this->morphTo();
    }

    public function setLanguage(LanguageStructure $language): self
    {
        Assert::isInstanceOf($language, Model::class);
        /** @var Model $language */
        $this->language()->associate($language);

        return $this;
    }

    public function getLanguage(): LanguageStructure
    {
        return $this->language;
    }
}
