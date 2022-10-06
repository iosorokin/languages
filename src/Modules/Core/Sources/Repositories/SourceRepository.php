<?php

namespace Modules\Core\Sources\Repositories;

use Modules\Core\Sources\Entities\Source;

interface SourceRepository
{
    public function save(Source $source): void;

    public function get(int $id): ?Source;
}
