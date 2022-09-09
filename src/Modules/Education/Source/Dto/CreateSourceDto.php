<?php

namespace Modules\Education\Source\Dto;

use App\Contracts\Structures\Languages\LanguageStructure;
use Illuminate\Support\Arr;

class CreateSourceDto
{
    public function __construct(
        public readonly ?LanguageStructure $language,
        public readonly ?string            $title,
        public readonly ?string            $description,
    ) {}

    public static function new(LanguageStructure $language, array $attributes): self
    {
        return new self(
            language: $language,
            title: Arr::get($attributes, 'title'),
            description: Arr::get($attributes, 'decription')
        );
    }
}
