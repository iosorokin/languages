<?php

namespace Domain\Personal\Values\Personality;

use App\Values\Personality\Name\Name;

interface Personality
{
    public function compare(Personality $objectValue): bool;

    public function getName(): Name;

    public function toArray(): array;
}
