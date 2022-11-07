<?php

declare(strict_types=1);

namespace Domain\Internal\Container\Listeners;

use Domain\Core\Sources\Events\SourceCreated;
use Domain\Core\Sources\Presenters\Internal\GetSource;
use Domain\Internal\Container\Presenters\Internal\InitWrapperContainer;
use Illuminate\Contracts\Queue\ShouldQueue;

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
