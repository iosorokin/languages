<?php

declare(strict_types=1);

namespace Domain\Chapters\Presenters\Mixins;

use Illuminate\Support\Arr;
use Domain\Chapters\Validators\CreateChapterValidator;
use Domain\Sources\Presenters\Internal\GetSource;
use Domain\Internal\Container\Enums\ContainerType;
use Domain\Internal\Container\Model\Container;
use Domain\Internal\Container\Presenters\Internal\CreateContainer;
use Domain\Internal\Container\Presenters\Internal\PushElement;

final class CreateChapter
{
    public function __construct(
        private CreateChapterValidator $validator,
        private CreateContainer        $createContainer,
        private PushElement            $pushElement,
        private GetSource              $getSource,
    ) {}

    public function __invoke(array $attributes): Container
    {
        $attributes = $this->validator->validate($attributes);
        $source = $this->getSource->getOrThrowBadRequest((int) Arr::get($attributes, 'source_id'));
        $wrapper = $source->container;
        $attributes['type'] = ContainerType::Chapter->value;
        $chapter = ($this->createContainer)($wrapper, $attributes);
        ($this->pushElement)($wrapper, $chapter);

        return $chapter;
    }
}
