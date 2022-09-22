<?php

namespace Modules\Education\Source\Structures;

use Modules\Languages\LanguageStructure;

/**
 * @property int $id
 * @property string $language_type
 * @property int $language_id
 * @property string $title
 * @property string $type
 * @property string $description
 */
interface SourceStructure
{
    public function setLanguage(LanguageStructure $language): self;

    public function getLanguage(): LanguageStructure;
}
