<?php

namespace Modules\Education\Source\Repositories;

use Modules\Education\Source\Entity\Source;

interface SourceRepository
{
    public function save(Source $source): void;

    public function get(int $id): ?Source;
}
