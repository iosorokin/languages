<?php

namespace Modules\Education\Source\Contexts\Fillers;

use App\Contracts\Structures\Education\SourceStructure;

final class SourceFiller
{
    public function __construct(
        private SourceStructure $structure
    ) {}

    public function setStructure(SourceStructure $structure): self
    {
        $this->structure = $structure;

        return $this;
    }

    public function getStructure(): SourceStructure
    {
        return $this->structure;
    }

    public function setType(string $type): self
    {

    }
}
