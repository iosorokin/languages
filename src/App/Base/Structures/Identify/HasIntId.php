<?php

namespace App\Base\Structures\Identify;

interface HasIntId
{
    public function setId(int $id): self;

    public function getId(): int;
}
