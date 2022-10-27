<?php

declare(strict_types=1);

namespace Modules\Core\Analysis\Factories;

use Modules\Core\Analysis\Model\Analysis;
use Modules\Core\Sentences\Model\Sentence;
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
