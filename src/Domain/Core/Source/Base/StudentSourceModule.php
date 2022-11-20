<?php

namespace Domain\Core\Source\Base;

use App\Base\Model\Values\Identificatiors\Id\IntId;
use App\Controll\Source\Student\CreateSourceImp;
use App\Controll\Source\Student\DeleteSourceImp;
use App\Controll\Source\Student\FindSourceImp;
use App\Controll\Source\Student\GetSourcesImp;
use App\Controll\Source\Student\UpdateSourceImp;
use Domain\Core\Source\Base\Model\Aggregate\SourceImp;
use Domain\Core\Source\Base\Model\Collection\StudentSources;

interface StudentSourceModule
{
    public function create(CreateSourceImp $command): IntId;

    public function update(UpdateSourceImp $command): void;

    public function delete(DeleteSourceImp $command): void;

    public function find(FindSourceImp $query): SourceImp;

    public function get(GetSourcesImp $query): StudentSources;
}
