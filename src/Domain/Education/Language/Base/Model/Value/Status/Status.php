<?php

namespace Domain\Education\Language\Base\Model\Value\Status;

use Stringable;

interface Status extends Stringable
{
    public function get(): string;

    public function compare(Status $status): bool;

    public function isActive(): bool;

    public function isDraft(): bool;
}
