<?php

declare(strict_types=1);

namespace Domain\Core\Source\Base;

use App\Base\Model\Values\Identificatiors\Id\IntId;
use App\Controll\Source\Student\CreateSourceImp;
use App\Controll\Source\Student\DeleteSourceImp;
use App\Controll\Source\Student\FindSourceImp;
use App\Controll\Source\Student\GetSourcesImp;
use App\Controll\Source\Student\UpdateSourceImp;
use Domain\Core\Source\Base\Controll\Query\FindSourceHandler;
use Domain\Core\Source\Base\Model\Aggregate\SourceImp;
use Domain\Core\Source\Base\Model\Collection\StudentSources;
use Domain\Core\Source\Student\Controll\Command\CreateSourceHandler;
use Domain\Core\Source\Student\Controll\Command\DeleteSourceHandler;
use Domain\Core\Source\Student\Controll\Command\UpdateSourceHandler;

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

    public function find(FindSourceImp $query): SourceImp
    {
        /** @var FindSourceHandler $handler */
        $handler = app()->get(FindSourceHandler::class);

        return $handler($query);
    }

    public function get(GetSourcesImp $query): StudentSources
    {
        $handler = app()->get(GetSourcesImp::class);

        return $handler($query);
    }
}
