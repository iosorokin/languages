<?php

declare(strict_types=1);

namespace Modules\Domain\Analysis\Factories;

use Modules\Domain\Analysis\Model\Analysis;
use Modules\Domain\Sentences\Model\Sentence;
use Modules\Personal\Infrastructure\Repository\EloquentUserModel;

final class AnalysisFactory
{
    public function create(Sentence $sentence, EloquentUserModel $user, array $attributes): Analysis
    {
        $analys = new Analysis();
        $analys->sentence()->associate($sentence);
        $analys->user()->associate($user);
        $analys->translate = $attributes['translate'];
        $analys->description = $attributes['description'];

        return $analys;
    }
}
