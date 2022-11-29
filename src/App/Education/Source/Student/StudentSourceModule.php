<?php

namespace App\Education\Source\Student;

use App\Controll\Source\Student\CreateSourceImp;
use App\Controll\Source\Student\DeleteSourceImp;
use App\Controll\Source\Student\FindSourceImp;
use App\Controll\Source\Student\GetSourcesImp;
use App\Controll\Source\Student\UpdateSourceImp;
use App\Education\Source\Student\Domain\Model\Aggregate\Source;
use App\Education\Source\Student\Domain\Model\Collection\StudentSources;
use Core\Base\Model\Values\Identificatiors\Id\IntId;

interface StudentSourceModule
{
    public function create(CreateSourceImp $command): IntId;

    public function update(UpdateSourceImp $command): void;

    public function delete(DeleteSourceImp $command): void;

    public function find(FindSourceImp $query): Source;

    public function get(GetSourcesImp $query): StudentSources;
}
