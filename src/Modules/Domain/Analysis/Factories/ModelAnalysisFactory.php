<?php

declare(strict_types=1);

namespace Modules\Domain\Analysis\Factories;

use Modules\Domain\Analysis\Structures\Analysis;
use Modules\Domain\Analysis\Structures\AnalysisModel;
use Modules\Domain\Sentences\Structures\Sentence;
use Modules\Personal\User\Structures\User;

final class ModelAnalysisFactory implements AnalysisFactory
{
    public function create(Sentence $sentence, User $user, array $attributes): Analysis
    {
        $analys = new AnalysisModel();
        $analys->setSentence($sentence);
        $analys->setUser($user);
        $analys->setTranslate($attributes['translate']);
        $analys->setDescription($attributes['description']);

        return $analys;
    }
}
