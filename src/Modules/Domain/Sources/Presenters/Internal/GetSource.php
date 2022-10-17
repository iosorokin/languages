<?php

declare(strict_types=1);

namespace Modules\Domain\Sources\Presenters\Internal;

use App\Extensions\Assert;
use Core\Services\Morph\Morph;
use Exception;
use Illuminate\Validation\ValidationException;
use Modules\Domain\Sources\Structures\Source;
use Modules\Domain\Sources\Repositories\SourceRepository;
use Modules\Internal\Container\Repositories\ContainerRepository;

final class GetSource implements GetSourcePresenter
{
    public function __construct(
        private SourceRepository $repository,
        private ContainerRepository $containerRepository,
    ) {}

    public function getOrThrowNotFound(int $id): Source
    {
        $source = $this->repository->get($id);
        abort_if(! $source, 404);
        $this->setContainer($source);

        return $source;
    }

    public function getOrThrowBadRequest(int $id): Source
    {
        $source = $this->repository->get($id);
        if (! $source) {
            throw ValidationException::withMessages([
                'source_id' => $this->getMessage($id),
            ]);
        }
        $this->setContainer($source);

        return $source;
    }

    public function getOrThrowException(int $id): Source
    {
        $source = $this->repository->get($id);
        if (! $source) {
            throw new Exception($this->getMessage($id));
        }
        $this->setContainer($source);

        return $source;
    }

    private function setContainer(Source $source): void
    {
        $containerable = $this->containerRepository->getByContainerable(
            Morph::getMorph($source),
            $source->getId(),
        );

        if ($containerable) {
            $source->setContainer($containerable);
        }
    }

    private function getMessage(int $id): string
    {
        return sprintf('Source with id %d not found', $id);
    }
}
