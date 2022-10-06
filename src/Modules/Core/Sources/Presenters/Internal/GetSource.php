<?php

declare(strict_types=1);

namespace Modules\Core\Sources\Presenters\Internal;

use Illuminate\Validation\ValidationException;
use Modules\Core\Sources\Entities\Source;
use Modules\Core\Sources\Repositories\SourceRepository;

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