<?php

declare(strict_types=1);

namespace Modules\Internal\Container\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\Domain\Sources\Events\SourceCreated;
use Modules\Domain\Sources\Presenters\Internal\GetSourcePresenter;
use Modules\Internal\Container\Presenters\Internal\InitWrapperContainerPresenter;

final class ContainerSourceCreatedListener implements ShouldQueue
{
    public function __construct(
        private InitWrapperContainerPresenter $initWrapperContainer,
        private GetSourcePresenter $getSource,
    ) {}

    public function __invoke(SourceCreated $event): void
    {
        $source = $this->getSource->getOrThrowException($event->sourceId);
        ($this->initWrapperContainer)($source);
    }
}
