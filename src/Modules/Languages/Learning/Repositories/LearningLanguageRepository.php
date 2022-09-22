<?php

namespace Modules\Languages\Learning\Repositories;

use App\Contracts\Structures\LearningLanguageStructure;

interface LearningLanguageRepository
{
    public function add(LearningLanguageStructure $learning): void;

    public function getById(int $id): LearningLanguageStructure;
}
