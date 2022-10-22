<?php

namespace Modules\Domain\Sources\Factories;

use Modules\Domain\Sources\Factories\Structure\SourceStructureFactory;
use Modules\Domain\Sources\Repositories\SourceRepository;

interface SourceFactory
{
    public function structure(): SourceStructureFactory;

    public function repository(): SourceRepository;
}
