<?php

declare(strict_types=1);

namespace Modules\Education\Rules\Structures;

use App\Extensions\Assert;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Modules\Languages\Common\Contracts\LanguageStructure;

final class RuleModel extends Model implements RuleStructure
{
    protected $table = 'rules';

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
