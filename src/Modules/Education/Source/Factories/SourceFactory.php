<?php

namespace Modules\Education\Source\Factories;

use App\Contracts\Structures\LanguageStructure;
use Illuminate\Support\Arr;
use Modules\Education\Source\Structures\SourceModel;

class SourceFactory
{
    public function new(LanguageStructure $language, array $attributes): SourceModel
    {
        $source = new SourceModel();
        $source->type = Arr::get($attributes, 'type');
        $source->title = Arr::get($attributes, 'title');
        $source->setLanguage($language);

        return $source;
    }
}
