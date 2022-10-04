<?php

namespace App\Base\Entity;

interface HasTitle
{
    public function setTitle(?string $title): self;

    public function getTitle(): ?string;
}
