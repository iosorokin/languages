<?php

namespace Modules\Domain\Sources\Repositories;

use Modules\Domain\Sources\Entities\Source;

interface SourceRepository
{
    public function save(Source $source): void;

    public function get(int $id): ?Source;
}