<?php

declare(strict_types=1);

namespace Modules\Education\Dictionaries\Structures;

use App\Contracts\Structures\DictionaryStructure;
use App\Contracts\Structures\LanguageStructure;
use App\Extensions\Assert;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

final class DictionaryModel extends Model implements DictionaryStructure
{
    protected $table = 'dictionaries';

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
