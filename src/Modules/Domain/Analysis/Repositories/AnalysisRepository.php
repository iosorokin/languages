<?php

namespace Modules\Domain\Analysis\Repositories;

use Modules\Domain\Analysis\Entities\Analysis;

interface AnalysisRepository
{
    public function save(Analysis $analysis): void;
}
