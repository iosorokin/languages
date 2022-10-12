<?php

namespace App\Base\Structures;

interface HasTitle
{
    public function setTitle(?string $title): self;

    public function getTitle(): ?string;
}
