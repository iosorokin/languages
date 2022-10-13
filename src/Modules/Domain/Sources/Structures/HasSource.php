<?php

namespace Modules\Domain\Sources\Structures;

interface HasSource
{
    public function setSource(Source $source): self;

    public function getSourceId(): int;

    public function getSource(): Source;
}