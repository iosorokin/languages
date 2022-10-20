<?php

namespace App\Base\Structure;

interface HasTitle
{
    public function setTitle(?string $title): self;

    public function getTitle(): ?string;
}
