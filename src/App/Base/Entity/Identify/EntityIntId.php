<?php

declare(strict_types=1);

namespace App\Base\Entity\Identify;

trait EntityIntId
{
    use IntId;

    public int $id;
}
