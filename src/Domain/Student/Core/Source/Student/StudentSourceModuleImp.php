<?php

declare(strict_types=1);

namespace Domain\Student\Core\Source\Student;

use App\Model\Values\Identificatiors\Id\IntId;
use Domain\Student\Core\Source\Student\Controll\Command\StudentCreateSource;
use Domain\Student\Core\Source\Student\Controll\Command\StudentCreateSourceHandler;
use Domain\Student\Core\Source\Student\Controll\Command\StudentDeleteSource;
use Domain\Student\Core\Source\Student\Controll\Command\StudentDeleteSourceHandler;
use Domain\Student\Core\Source\Student\Controll\Command\StudentUpdateSource;
use Domain\Student\Core\Source\Student\Controll\Command\StudentUpdateSourceHandler;
use Domain\Student\Core\Source\Student\Controll\Query\StudentFindSource;
use Domain\Student\Core\Source\Student\Controll\Query\StudentFindSourceHandler;
use Domain\Student\Core\Source\Student\Controll\Query\StudentGetSources;
use Domain\Student\Core\Source\Student\Model\Aggregate\StudentSource;
use Domain\Student\Core\Source\Student\Model\Collection\StudentSources;

final class StudentSourceModuleImp implements StudentSourceModule
{
    public function create(StudentCreateSource $command): IntId
    {
        /** @var StudentCreateSourceHandler $handler */
        $handler = app()->get(StudentCreateSourceHandler::class);

        return $handler($command);
    }

    public function update(StudentUpdateSource $command): void
    {
        /** @var StudentUpdateSourceHandler $handler */
        $handler = app()->get(StudentUpdateSourceHandler::class);

        $handler($command);
    }

    public function delete(StudentDeleteSource $command): void
    {
        /** @var StudentDeleteSourceHandler $handler */
        $handler = app()->get(StudentDeleteSourceHandler::class);
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
