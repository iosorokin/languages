<?php

namespace Modules\Education\Rules\Structures;

use Illuminate\Support\Carbon;
use Modules\Languages\Common\Contracts\LanguageStructure;

/**
 * @property int $id
 * @property string $language_type
 * @property int $language_id
 * @property string $title
 * @property string $description
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
interface RuleStructure
{
    public function setLanguage(LanguageStructure $language): self;

    public function getLanguage(): LanguageStructure;
}
