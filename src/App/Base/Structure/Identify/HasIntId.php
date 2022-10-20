<?php

namespace App\Base\Structure\Identify;

interface HasIntId
{
    public function setId(int $id): self;

    public function getId(): int;
}
