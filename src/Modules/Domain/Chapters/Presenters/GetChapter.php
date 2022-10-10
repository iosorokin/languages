<?php

declare(strict_types=1);

namespace Modules\Domain\Chapters\Presenters;

use Illuminate\Validation\ValidationException;
use Modules\Internal\Container\Entites\Container;
use Modules\Internal\Container\Repositories\ContainerRepository;

final class GetChapter implements GetChapterPresenter
{
    public function __construct(
        private ContainerRepository $containerRepository,
    ) {}

    public function getOrThrowNotFound(int $id): Container
    {
        $chapter = $this->containerRepository->getChapter($id);
        abort_if(! $chapter, 404);

        return $chapter;
    }

    public function getOrThrowBadRequest(int $id): Container
    {
        $chapter = $this->containerRepository->getChapter($id);
        if (! $chapter) {
            throw ValidationException::withMessages([
                'chapter_id' => sprintf('Chapter with id %d not found', $id)
            ]);
        }

        return $chapter;
    }
}
