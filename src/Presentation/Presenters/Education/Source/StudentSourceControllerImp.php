<?php

declare(strict_types=1);

namespace Domain\Education\Source\Student;

use Domain\Education\Source\Student\Domain\Cases\CreateSourceHandler;
use Domain\Education\Source\Student\Domain\Cases\DeleteSourceHandler;
use Domain\Education\Source\Student\Domain\Cases\Dto\CreateSourceDto;
use Domain\Education\Source\Student\Domain\Cases\Dto\UpdateSourceDto;
use Domain\Education\Source\Student\Domain\Cases\UpdateSourceHandler;
use Domain\Education\Source\Student\Domain\Model\Aggregate\Source;
use Domain\Education\Source\Student\Domain\Model\Factories\RestoreSourceFactory;
use Domain\Education\Source\Student\Infrastructure\Database\SourceRepository;
use Core\Base\Controller\DomainController;
use Core\Base\Model\Values\Identificatiors\Id\IntId;
use Core\Base\Request\RequestData;
use Core\Infrastructure\Query\FindSourceById;

final class StudentSourceControllerImp extends DomainController implements StudentSourceController
{
    public function create(RequestData $request, CreateSourceHandler $handler): IntId
    {
        $dto = CreateSourceDto::create($request);
        $source = $handler($dto);
        $this->eventDispatcher->dispatchAll($source->events());

        return $source->id();
    }

    public function update(
        RequestData $request,
        UpdateSourceHandler $handler,
        SourceRepository $repository
    ): void
    {
        $sourceId = (int) $request->get('source_id', 0);
        $structure = $repository->find(FindSourceById::create($sourceId));
        $source = RestoreSourceFactory::fromStructure($structure);

        $dto = UpdateSourceDto::create($request);
        $source = $handler($dto);
        $this->eventDispatcher->dispatchAll($source->events());
    }

    public function delete(DeleteSourceImp $command): void
    {
        /** @var DeleteSourceHandler $handler */
        $handler = app()->get(DeleteSourceHandler::class);
        $handler($command);
    }

    public function find(FindSourceImp $query): Source
    {
        /** @var GetSourceController $handler */
        $handler = app()->get(GetSourceController::class);

        return $handler($query);
    }

    public function get(GetSourcesImp $query): StudentSources
    {
        $handler = app()->get(GetSourcesImp::class);

        return $handler($query);
    }
}
