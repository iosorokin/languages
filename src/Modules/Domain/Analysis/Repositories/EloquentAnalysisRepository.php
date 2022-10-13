<?php

declare(strict_types=1);

namespace Modules\Domain\Analysis\Repositories;

use Modules\Domain\Analysis\Structures\Analysis;

final class EloquentAnalysisRepository implements AnalysisRepository
{
    public function save(Analysis $analysis): void
    {
        $analysis->save();
    }
}