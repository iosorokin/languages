<?php

namespace App\Base\Entity\Identify;

interface HasIntId
{
    public function setId(int $id): self;

    public function getId(): int;
}
