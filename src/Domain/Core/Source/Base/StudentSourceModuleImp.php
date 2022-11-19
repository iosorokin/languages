<?php

declare(strict_types=1);

namespace Domain\Core\Source\Base;

use App\Base\Model\Values\Identificatiors\Id\IntId;
use Domain\Core\Source\Base\Controll\Command\CreateSourceImp;
use Domain\Core\Source\Base\Controll\Command\CreateSourceHandler;
use Domain\Core\Source\Base\Controll\Command\DeleteSourceImp;
use Domain\Core\Source\Base\Controll\Command\DeleteSourceHandler;
use Domain\Core\Source\Base\Controll\Command\UpdateSourceImp;
use Domain\Core\Source\Base\Controll\Command\UpdateSourceHandler;
use Domain\Core\Source\Base\Controll\Query\StudentFindSource;
use Domain\Core\Source\Base\Controll\Query\StudentFindSourceHandler;
use Domain\Core\Source\Base\Controll\Query\StudentGetSources;
use Domain\Core\Source\Base\Model\Aggregate\StudentSource;
use Domain\Core\Source\Base\Model\Collection\StudentSources;

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

    public function find(StudentFindSource $query): StudentSource
    {
        /** @var StudentFindSourceHandler $handler */
        $handler = app()->get(StudentFindSourceHandler::class);

        return $handler($query);
    }

    public function get(StudentGetSources $query): StudentSources
    {
        $handler = app()->get(StudentGetSources::class);

        return $handler($query);
    }
}
