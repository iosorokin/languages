<?php

namespace App\Base\Structures;

interface HasDescription
{
    public function setDescription(?string $description): self;

    public function getDescription(): ?string;
}
