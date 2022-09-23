<?php

declare(strict_types=1);

namespace Modules\Container\Service;

use Modules\Container\Repository\ContainerRepository;
use Modules\Container\Structures\ContainerStructure;

final class ElementPositionCalculator
{
    private const START_POSITION = 1;

    private const STEP = 10;

    public function __construct(
        private ContainerStructure $container,
        private ContainerRepository $repository,
    ) {}

    public function next(): int
    {
        $lastPositionInContainer = $this->repository->getLastPosition($this->container->id) ?? self::START_POSITION;
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
