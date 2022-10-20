<?php

namespace App\Base\Structure;

interface HasDescription
{
    public function setDescription(?string $description): self;

    public function getDescription(): ?string;
}
