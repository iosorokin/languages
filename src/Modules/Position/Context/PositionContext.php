<?php

namespace Modules\Position\Context;

use App\Structures\PositionStructure;
use Modules\Position\Values\Positions;

class PositionContext
{
    public function __construct(
        public readonly PositionStructure $structure,
    ) {
        if (! $this->structure->positions) {
            $this->initPositions();
        }
    }

    private function initPositions(): self
    {
        $this->structure->positions = new Positions([]);

        return $this;
    }
}
