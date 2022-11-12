<?php

declare(strict_types=1);

namespace WIP\Core\Analysis\Factories;

use Infrastructure\Database\Repositories\Personal\Eloquent\EloquentUserModel;
use WIP\Core\Analysis\Model\Analysis;
use WIP\Core\Sentences\Model\Sentence;

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
