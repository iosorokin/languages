<?php

declare(strict_types=1);

namespace Modules\Container\Services;

use Modules\Container\Repositories\ContainerRepository;
use Modules\Container\Entites\Container;

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
        $lastPositionInContainer = $this->repository->getLastPosition($this->container->getId()) ?? self::START_POSITION;
        $savingElementPosition = $lastPositionInContainer + self::STEP;

        return $savingElementPosition;
    }

    public function nextAfter(int $pos): int
    {

    }

    public function nextBefore(int $pos): int
    {

    }
}
