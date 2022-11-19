<?php

namespace Domain\Core\Source\Base;

use App\Base\Model\Values\Identificatiors\Id\IntId;
use Domain\Core\Source\Base\Controll\Command\CreateSourceImp;
use Domain\Core\Source\Base\Controll\Command\DeleteSourceImp;
use Domain\Core\Source\Base\Controll\Command\UpdateSourceImp;
use Domain\Core\Source\Base\Controll\Query\StudentFindSource;
use Domain\Core\Source\Base\Controll\Query\StudentGetSources;
use Domain\Core\Source\Base\Model\Aggregate\StudentSource;
use Domain\Core\Source\Base\Model\Collection\StudentSources;

interface StudentSourceModule
{
    public function create(CreateSourceImp $command): IntId;

    public function update(UpdateSourceImp $command): void;

    public function delete(DeleteSourceImp $command): void;

    public function find(StudentFindSource $query): StudentSource;

    public function get(StudentGetSources $query): StudentSources;
}
