<?php

declare(strict_types=1);

namespace Modules\Container\Actions;

use Exception;
use Modules\Container\Contracts\ContainerableElement;
use Modules\Container\Factories\ContainerElementFactory;
use Modules\Container\Repository\ContainerRepository;
use Modules\Container\Service\ElementPositionCalculator;
use Modules\Container\Structures\ContainerElementStructure;
use Modules\Container\Structures\ContainerStructure;

final class ContainerDispatcher
{
    public function __construct(
        private ElementPositionCalculator $calculator,
        private ContainerRepository $repository,
        private ContainerElementFactory $elementFactory,
    ) {
        $this->repository = app()->make(ContainerRepository::class);
        $this->elementFactory = app()->make(ContainerElementFactory::class);
        $this->calculator = new ElementPositionCalculator($this->container, $this->repository);
    }

    public function setContainer(ContainerStructure $container): self
    {
        $this->container = $container;

        return $this;
    }

    public function push(ContainerableElement $element): ContainerElementStructure
    {
        $containerElement = $this->elementFactory->create($this->container, $element);
        $containerElement->position = $this->calculator->next();

        try {
            $this->repository->push($this->container, $containerElement);
        } catch (Exception) {
            static $tries;
            $tries++;
            if ($tries < 5) {
                $this->push($element);
            } else {
                throw new Exception(); //todo доделать
            }
        }

        return $containerElement;
    }
}
