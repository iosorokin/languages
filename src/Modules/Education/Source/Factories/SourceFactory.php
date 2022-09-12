<?php

namespace Modules\Education\Source\Factories;

use App\Contracts\Structures\Education\SourceStructure;
use Illuminate\Support\Arr;
use Modules\Education\Source\Contexts\Fillers\SourceFiller;
use Modules\Education\Source\Structures\SourceModel;

class SourceFactory
{
    public function __construct(
        private SourceFiller $sourceFiller,
    ) {}

    public function new(array $attributes): SourceStructure
    {
        $source = new SourceModel();
        $this->sourceFiller->setStructure($source)
            ->setType(Arr::get($attributes, 'type'));
    }
}
