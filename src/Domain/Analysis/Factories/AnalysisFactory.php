<?php

declare(strict_types=1);

namespace Domain\Analysis\Factories;

use Infrastructure\Database\Repositories\Personal\Eloquent\EloquentUserModel;
use Domain\Analysis\Model\Analysis;
use Domain\Sentences\Model\Sentence;

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
