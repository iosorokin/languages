<?php

namespace Domain\Personal\Values\Personality;

use Domain\Personal\Values\Personality\Name\Name;

interface Personality
{
    public function compare(Personality $objectValue): bool;

    public function getName(): Name;

    public function toArray(): array;
}
