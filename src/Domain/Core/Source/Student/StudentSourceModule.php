<?php

namespace Domain\Core\Source\Student;

use App\Model\Values\Identificatiors\Id\IntId;
use Domain\Core\Source\Student\Controll\Command\StudentCreateSource;
use Domain\Core\Source\Student\Controll\Command\StudentDeleteSource;
use Domain\Core\Source\Student\Controll\Command\StudentUpdateSource;
use Domain\Core\Source\Student\Controll\Query\StudentFindSource;
use Domain\Core\Source\Student\Controll\Query\StudentGetSources;
use Domain\Core\Source\Student\Model\Aggregate\StudentSource;
use Domain\Core\Source\Student\Model\Collection\StudentSources;

interface StudentSourceModule
{
    public function create(StudentCreateSource $command): IntId;

    public function update(StudentUpdateSource $command): void;

    public function delete(StudentDeleteSource $command): void;

    public function find(StudentFindSource $query): StudentSource;

    public function get(StudentGetSources $query): StudentSources;
}
