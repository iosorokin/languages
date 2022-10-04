<?php

declare(strict_types=1);

namespace Modules\Container\Services;

use Exception;
use Modules\Container\Contracts\ContainerableElement;
use Modules\Container\Entites\Container;
use Modules\Container\Entites\ContainerElement;
use Modules\Container\Factories\ContainerElementFactory;
use Modules\Container\Repositories\ContainerRepository;

final class ContainerDispatcher
{
    private Container $container;

    public function __construct(
        private ElementPositionCalculator $calculator,
        private ContainerRepository $repository,
        private ContainerElementFactory $elementFactory,
    ) {}

    public function setContainer(Container $container): self
    {
        $this->container = $container;
        $this->calculator->setContainer($container);

        return $this;
    }

    public function push(ContainerableElement $element): ContainerElement
    {
        $containerElement = $this->elementFactory->create($this->container, $element);
        $containerElement->position = $this->calculator->next();

        static $tries = 0;
        try {
            $this->repository->push($this->container, $containerElement);
        } catch (Exception) {
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
