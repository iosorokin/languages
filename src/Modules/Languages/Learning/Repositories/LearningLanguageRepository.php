<?php

namespace Modules\Languages\Learning\Repositories;

use Modules\Languages\Learning\Structures\LearningLanguageStructure;

interface LearningLanguageRepository
{
    public function add(LearningLanguageStructure $learning): void;

    public function getById(int $id): LearningLanguageStructure;
}
