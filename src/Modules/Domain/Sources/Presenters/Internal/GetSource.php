<?php

declare(strict_types=1);

namespace Modules\Domain\Sources\Presenters\Internal;

use Illuminate\Validation\ValidationException;
use Modules\Domain\Sources\Entities\Source;
use Modules\Domain\Sources\Repositories\SourceRepository;

final class GetSource implements GetSourcePresenter
{
    public function __construct(
        private SourceRepository $repository,
    ) {}

    public function getOrThrowNotFound(int $id): Source
    {
        $source = $this->repository->get($id);
        abort_if(! $source, 404);

        return $source;
    }

    public function getOrThrowBadRequest(int $id): Source
    {
        $source = $this->repository->get($id);
        if (! $source) {
            throw ValidationException::withMessages([
                'source_id' => sprintf('Source with id %d not found', $id)
            ]);
        }

        return $source;
    }
}
