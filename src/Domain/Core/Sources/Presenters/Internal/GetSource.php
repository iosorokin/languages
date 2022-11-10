<?php

declare(strict_types=1);

namespace Domain\Core\Sources\Presenters\Internal;

use Domain\Core\Sources\Structures\Source;
use Exception;
use Illuminate\Validation\ValidationException;

final class GetSource
{
    public function get(int $id): ?Source
    {
        return Source::find($id);
    }

    public function getOrThrowNotFound(int $id): Source
    {
        $source = $this->get($id);
        abort_if(! $source, 404);
        $this->withContainer($source);

        return $source;
    }

    public function getOrThrowBadRequest(int $id): Source
    {
        $source = $this->get($id);
        if (! $source) {
            throw ValidationException::withMessages([
                'source_id' => $this->getMessage($id),
            ]);
        }
        $this->withContainer($source);

        return $source;
    }

    public function getOrThrowException(int $id): Source
    {
        $source = $this->get($id);
        if (! $source) {
            throw new Exception($this->getMessage($id));
        }
        $this->withContainer($source);

        return $source;
    }

    private function withContainer(Source $source): void
    {
        $source->load('container');
    }

    private function getMessage(int $id): string
    {
        return sprintf('Source with id %d not found', $id);
    }
}