<?php

declare(strict_types=1);

namespace Modules\Domain\Analysis\Factories;

use Modules\Domain\Analysis\Entities\Analysis;
use Modules\Domain\Analysis\Entities\AnalysisModel;
use Modules\Domain\Sentences\Entities\Sentence;
use Modules\Personal\User\Entities\User;

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
