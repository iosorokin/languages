<?php

declare(strict_types=1);

namespace Modules\Internal\Container\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\Domain\Sources\Events\SourceCreated;
use Modules\Domain\Sources\Presenters\Internal\GetSource;
use Modules\Internal\Container\Presenters\Internal\InitWrapperContainer;

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
