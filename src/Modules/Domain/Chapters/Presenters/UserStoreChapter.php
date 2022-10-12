<?php

declare(strict_types=1);

namespace Modules\Domain\Chapters\Presenters;

use Illuminate\Support\Arr;
use Modules\Domain\Chapters\Policies\ChapterPolicy;
use Modules\Domain\Chapters\Validators\CreateChapterValidator;
use Modules\Domain\Sources\Presenters\Internal\GetSourcePresenter;
use Modules\Internal\Container\Structures\Container;
use Modules\Internal\Container\Enums\ContainerType;
use Modules\Internal\Container\Presenters\Internal\CreateContainerPresenter;
use Modules\Internal\Container\Presenters\Internal\PushElementPresenter;
use Modules\Personal\Auth\Presenters\GetClientPresenter;

final class UserStoreChapter implements UserStoreChapterPresenter
{
    public function __construct(
        private CreateChapterValidator   $validator,
        private CreateContainerPresenter $createContainer,
        private PushElementPresenter     $pushElement,
        private GetClientPresenter       $getClient,
        private GetSourcePresenter       $getSource,
        private ChapterPolicy            $policy,
    ) {}

    public function __invoke(array $attributes): Container
    {
        $attributes = $this->validator->validate($attributes);

        $source = $this->getSource->getOrThrowBadRequest((int) Arr::get($attributes, 'source_id'));
        $client = ($this->getClient)();
        $this->policy->canCreate($client, $source);
        $wrapper = $source->getContainer();
        $attributes['type'] = ContainerType::Chapter->value;
        $chapter = ($this->createContainer)($wrapper, $attributes);
        ($this->pushElement)($wrapper, $chapter);

        return $chapter;
    }
}
