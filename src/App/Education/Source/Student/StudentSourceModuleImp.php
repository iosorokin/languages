<?php

declare(strict_types=1);

namespace App\Education\Source\Student;

use App\Controll\Source\Student\CreateSourceImp;
use App\Controll\Source\Student\DeleteSourceImp;
use App\Controll\Source\Student\FindSourceImp;
use App\Controll\Source\Student\GetSourcesImp;
use App\Controll\Source\Student\UpdateSourceImp;
use App\Education\Source\Student\Controll\Cases\CreateSourceHandler;
use App\Education\Source\Student\Controll\Cases\DeleteSourceHandler;
use App\Education\Source\Student\Controll\Cases\GetSourceHandler;
use App\Education\Source\Student\Controll\Cases\UpdateSourceHandler;
use App\Education\Source\Student\Domain\Model\Aggregate\Source;
use App\Education\Source\Student\Domain\Model\Collection\StudentSources;
use Core\Base\Model\Values\Identificatiors\Id\IntId;

final class StudentSourceModuleImp implements StudentSourceModule
{
    public function create(CreateSourceImp $command): IntId
    {
        /** @var CreateSourceHandler $handler */
        $handler = app()->get(CreateSourceHandler::class);

        return $handler($command);
    }

    public function update(UpdateSourceImp $command): void
    {
        /** @var UpdateSourceHandler $handler */
        $handler = app()->get(UpdateSourceHandler::class);

        $handler($command);
    }

    public function delete(DeleteSourceImp $command): void
    {
        /** @var DeleteSourceHandler $handler */
        $handler = app()->get(DeleteSourceHandler::class);
        $handler($command);
    }

    public function find(FindSourceImp $query): Source
    {
        /** @var GetSourceHandler $handler */
        $handler = app()->get(GetSourceHandler::class);

        return $handler($query);
    }

    public function get(GetSourcesImp $query): StudentSources
    {
        $handler = app()->get(GetSourcesImp::class);

        return $handler($query);
    }
}
