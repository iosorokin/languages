<?php

namespace Domain\Core\Languages\Model\Values\Text;

use App\Values\ValueObject;
use Stringable;

interface Description extends ValueObject, Stringable
{
    public function get(): ?string;

    public function compare(Description $description): bool;
}
