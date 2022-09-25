<?php

namespace Modules\Container\Factories;

use Illuminate\Support\Arr;
use Modules\Education\Source\Structures\SourceModel;
use Modules\Languages\Common\Contracts\LanguageStructure;

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
