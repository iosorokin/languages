<?php

declare(strict_types=1);

namespace Modules\Container\Services\Dispatcher;

use Modules\Container\Entites\Container;
use Modules\Container\Repositories\ContainerRepository;

final class ElementPositionCalculator
{
    private Container $container;

    private const START_POSITION = 1;

    private const STEP = 10;

    public function __construct(
        private ContainerRepository $repository,
    ) {}

    public function setContainer(Container $container): self
    {
        $this->container = $container;

        return $this;
    }

    public function next(): int
    {
        $lastPositionInContainer = $this->repository->getLastPosition($this->container->getId());
        $expectedLastPosition = $this->container->getCount() * self::STEP + 1;

        if (! $lastPositionInContainer) {
            $savingElementPosition = self::START_POSITION;
        } else {
            $savingElementPosition = max($expectedLastPosition, $lastPositionInContainer);
        }

        return $savingElementPosition;
    }

    public function nextAfter(int $pos): int
    {

    }

    public function nextBefore(int $pos): int
    {

    }
}
