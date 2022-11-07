<?php

declare(strict_types=1);

namespace Domain\Core\Analysis\Factories;

use Domain\Core\Analysis\Model\Analysis;
use Domain\Core\Sentences\Model\Sentence;
use Infrastructure\Database\Repositories\Personal\Eloquent\EloquentUserModel;

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
