<?php

declare(strict_types=1);

namespace WIP\Core\Chapters\Presenters\Internal;

use Illuminate\Validation\ValidationException;
use WIP\Internal\Container\Model\Container;

final class GetChapter
{
    public function get(int $id): ?Container
    {
        return Container::find($id);
    }

    public function getOrThrowNotFound(int $id): Container
    {
        $chapter = $this->get($id);
        abort_if(! $chapter, 404);

        return $chapter;
    }

    public function getOrThrowBadRequest(int $id): Container
    {
        $chapter = $this->get($id);
        if (! $chapter) {
            throw ValidationException::withMessages([
                'chapter_id' => sprintf('Chapter with id %d not found', $id)
            ]);
        }

        return $chapter;
    }
}
