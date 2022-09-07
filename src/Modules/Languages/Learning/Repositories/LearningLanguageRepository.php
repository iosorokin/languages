<?php

namespace Modules\Languages\Learning\Repositories;

use App\Contracts\Structures\Languages\LearningLanguageStructure;

interface LearningLanguageRepository
{
    public function add(LearningLanguageStructure $learning): void;
}
