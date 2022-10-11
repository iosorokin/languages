<?php

namespace Modules\Domain\Analysis\Factories;

use Modules\Domain\Analysis\Entities\Analysis;
use Modules\Domain\Sentences\Entities\Sentence;
use Modules\Personal\User\Entities\User;

interface AnalysisFactory
{
    public function create(Sentence $sentence, User $user, array $attributes): Analysis;
}
