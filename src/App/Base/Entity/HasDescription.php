<?php

namespace App\Base\Entity;

interface HasDescription
{
    public function setDescription(?string $description): self;

    public function getDescription(): ?string;
}
