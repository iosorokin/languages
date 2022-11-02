<?php

declare(strict_types=1);

namespace Domain\Internal\Container\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Domain\Sources\Events\SourceCreated;
use Domain\Sources\Presenters\Internal\GetSource;
use Domain\Internal\Container\Presenters\Internal\InitWrapperContainer;

final class ContainerSourceCreatedListener implements ShouldQueue
{
    public function __construct(
        private InitWrapperContainer $initWrapperContainer,
        private GetSource $getSource,
    ) {}

    public function __invoke(SourceCreated $event): void
    {
        $source = $this->getSource->getOrThrowException($event->source->id);
        ($this->initWrapperContainer)($source);
    }
}
