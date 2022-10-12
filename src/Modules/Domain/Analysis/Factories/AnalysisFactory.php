<?php

namespace Modules\Domain\Analysis\Factories;

use Modules\Domain\Analysis\Structures\Analysis;
use Modules\Domain\Sentences\Structures\Sentence;
use Modules\Personal\User\Structures\User;

interface AnalysisFactory
{
    public function create(Sentence $sentence, User $user, array $attributes): Analysis;
}
