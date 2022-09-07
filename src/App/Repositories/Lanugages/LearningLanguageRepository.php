<?php

namespace App\Repositories\Lanugages;

use App\Structures\Languages\LearningLanguageStructure;

interface LearningLanguageRepository
{
    public function add(LearningLanguageStructure $learning): void;
}
