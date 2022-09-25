<?php

namespace Modules\Education\Dictionary\Structures;

use Modules\Languages\Common\Contracts\LanguageStructure;

/**
 * @property int $id
 * @property string $language_type
 * @property int $language_id
 * @property string $title
 * @property string $description
 * @property int $learning_id
 */
interface DictionaryStructure
{
    public function setLanguage(LanguageStructure $language): self;

    public function getLanguage(): LanguageStructure;
}