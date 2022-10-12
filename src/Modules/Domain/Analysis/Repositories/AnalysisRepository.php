<?php

namespace Modules\Domain\Analysis\Repositories;

use Modules\Domain\Analysis\Structures\Analysis;

interface AnalysisRepository
{
    public function save(Analysis $analysis): void;
}
