<?php

namespace Modules\Personal\Learner\Factories;

use App\Structures\Personal\LearnerStructure;
use Modules\Personal\Learner\Contexts\Learner;
use Modules\Personal\Learner\Dto\CreateLearnerDto;

class LearnerFactory
{
    public function new(CreateLearnerDto $dto): Learner
    {
        $structure = $this->createLearnerStructure();
        $this->setRelations($structure, $dto);
        $learner = $this->createContext($structure);

        return $learner;
    }

    private function createLearnerStructure(): LearnerStructure
    {
        return app()->make(LearnerStructure::class);
    }

    private function setRelations(LearnerStructure $structure, CreateLearnerDto $dto): void
    {
        $structure->setUser($dto->getUser());
    }

    private function createContext(LearnerStructure $structure): Learner
    {
        $learner = new Learner($structure);

        return $learner;
    }
}
