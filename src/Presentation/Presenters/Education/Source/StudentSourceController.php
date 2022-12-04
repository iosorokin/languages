<?php

namespace Domain\Education\Source\Student;

use Domain\Education\Source\Student\Domain\Cases\CreateSourceHandler;
use Domain\Education\Source\Student\Domain\Cases\UpdateSourceHandler;
use Domain\Education\Source\Student\Domain\Model\Aggregate\Source;
use Domain\Education\Source\Student\Infrastructure\Database\SourceRepository;
use Core\Base\Model\Values\Identificatiors\Id\IntId;
use Core\Base\Request\RequestData;

interface StudentSourceController
{
    public function create(RequestData $request, CreateSourceHandler $handler): IntId;

    public function update(
        RequestData         $request,
        UpdateSourceHandler $handler,
        SourceRepository    $repository
    ): void;

    public function delete(RequestData $request): void;

    public function find(RequestData $request): Source;

    public function get(RequestData $request): StudentSources;
}
