<?php

namespace Domain\Core\Language\Base\Model\Value\Status;

use Stringable;

interface Status extends Stringable
{
    public function get(): string;

    public function compare(Status $status): bool;
}
