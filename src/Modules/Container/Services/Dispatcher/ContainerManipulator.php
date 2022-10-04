<?php

declare(strict_types=1);

namespace Modules\Container\Services\Dispatcher;

use Exception;
use Modules\Container\Contracts\ContainerableElement;
use Modules\Container\Entites\Container;
use Modules\Container\Entites\ContainerElement;
use Modules\Container\Factories\ContainerElementFactory;
use Modules\Container\Repositories\ContainerRepository;

final class ContainerManipulator
{
    private Container $container;

    public function __construct(
        private ContainerElementFactory $elementFactory,
        private ElementPositionCalculator $calculator,
        private ContainerRepository $repository,
    ) {}

    public function setContainer(Container $container): self
    {
        $this->container = $container;

        return $this;
    }

    public function push(ContainerableElement $element): ContainerElement
    {
        $containerElement = $this->elementFactory->create($this->container, $element);
        $containerElement->setPosition($this->calculator->setContainer($this->container)->next());

        static $tries = 0;
        try {
            $this->repository->saveElement($containerElement);
        } catch (Exception $e) {
            $tries++;
            if ($tries < 5) {
                $this->push($element);
            } else {
                throw new Exception(sprintf('Ошибка определения позиции в контейнере: %s', $e->getMessage())); //todo доделать
            }
        }

        return $containerElement;
    }

    public function insertAfter(int $id, ContainerableElement $element): ContainerElement
    {
        $replaceElement = $this->container->getElements()->where('id', $id);
        $replaceKey = $replaceElement->keys()[0];
        $removedPos = $replaceElement->first()->getPosition();

        $offset = max($replaceKey - 10, 0);
        $slice = $this->container->getElements()->slice($offset, 10);

        dd($slice);






        $containerElement = $this->elementFactory->create($this->container, $element);

        return $containerElement;
    }
}
