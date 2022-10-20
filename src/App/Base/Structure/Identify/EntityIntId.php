<?php

declare(strict_types=1);

namespace App\Base\Structure\Identify;

trait EntityIntId
{
    use IntId;

    public int $id;
}
