<?php

declare(strict_types=1);

namespace Domain\Internal\Container\Services\Dispatcher;

use Exception;
use Illuminate\Support\Collection;
use Domain\Internal\Container\Contracts\ContainerableElement;
use Domain\Internal\Container\Model\Container;
use Domain\Internal\Container\Model\ContainerElement;
use Domain\Internal\Container\Factories\ContainerElementFactory;

final class ContainerManipulator
{
    private Container $container;

    public function __construct(
        private ContainerElementFactory $elementFactory,
        private ElementPositionCalculator $calculator,
    ) {}

    public function setContainer(Container $container): self
    {
        $this->container = $container;

        return $this;
    }

    public function push(ContainerableElement $element): ContainerElement
    {
        $containerElement = $this->elementFactory->create($this->container, $element);
        $nextPosition = $this->calculator->setContainer($this->container)->next();
        $containerElement->position = $nextPosition;

        static $tries = 0;
        try {
            $containerElement->save();
            $this->container->refresh();
            $lastPosition = max($containerElement->position, $this->container->getLastPosition());
            $this->container->setLastPosition($lastPosition);
            $this->container->setCount($this->container->getCount() + 1); //todo переписать на внутренний метод-инкремент
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
        // элемент контейнера нужно загружать только наперёд, условно + 50. Назад контейнер не движется
        $newElement = $this->elementFactory->create($this->container, $element);

        // 1. Проверяем был ли элемент вставлен в начало или после метки (mark)
        if ($id === 0) {
            // 1.1. (вначало) проверяем первый и второй элемементы, что первый можно подвинуть между новым элементом и вторым
        } else {
            // 1.2. (после метки) поверяем элемент, следующий за меткой что между ними есть свободное пространство
            $markedElement = $this->container->getElements()->where('id', $id);
            $markedElementKey = $markedElement->keys()->first();
            $markedElementPos = $markedElement->first()->getPosition();

            $nextElementKey = $markedElementKey + 1;
            /** @var ContainerElement $nextElement */
            $nextElement = $this->container->getElements()->get($nextElementKey);
            $nextElementPos = $nextElement->getPosition();

            $hasEmptySpace = $nextElementPos - $markedElementPos > 1;

            if ($hasEmptySpace) {
                // 1.2.1. свободное место есть, всё хорошо. ЗАВЕРШЕНИЕ
                $newPos = (int) floor(($nextElementPos + $markedElementPos) / 2);
                $newElement->position = $newPos;
            } else {
                // 1.2.2. свободного места нет, придётся двигать элементы
                // контейнер должен поддерживать принцип самовыравнивания, поэтому толкаем только вправо
                // берём срез до первого элемента, где расстояние между ними 10 и более.
                // при этом надо учесть что если упрёмся в конец контейнера то надо ровнять последний элемент

                $elements = $this->container->getElements()->where('id', '>', $id);

                $slice = new Collection();
                $elements->each(function (ContainerElement $containerElement) use ($slice) {
                    static $lastElement;

                    if ($lastElement && $containerElement->getPosition() - $lastElement->getPosition() >= 10) {
                        return false;
                    }
                    $lastElement = $containerElement;
                    $slice->push($containerElement);

                    return true;
                });

                $slice = $slice->reverse();
                $slice->push($newElement);
                /** @var ContainerElement $lastElementInSlice */
                $lastElementInSlice = $slice->first();
                $isLastElementInContainer = $lastElementInSlice->getPosition() === $this->container->getLastPosition();
                if ($isLastElementInContainer) {
                    // 1.2.2.1. если в слайс попал конец контейнера всё просто - двигаем последний элемент на его правильное место
                    // а остальные передвигаем относительно правого края
                    $expectedPos = $this->container->getCount() * 10 + 1;
                    // может быть ситуация, что в контейнере удаляли элементы и позиция последнего больше предполагаемой
                    if ($expectedPos > $lastElementInSlice->getPosition()) {
                        //1.2.2.1.1 если последний элемент получилось сдвинуть на его ожидаемую  позицию то всех можно двигать на -10
                        $pos = $expectedPos;
                        $slice->transform(function (ContainerElement $containerElement) use (&$pos) {
                            $containerElement->position = $pos;
                            $pos -= 10;

                            return $containerElement;
                        });
                    } else {
                        // теперь сложнее, в контейнере явно удалялись элементы и последний занимает не своё место
                        // двигать мы его не будем, но остальные надо придвинуть поближе.
                        // при этом надо не промахнуться чтобы не подвинуть элементы не в том порядке


                    }
                } else {
                    // 1.2.2.2. если не последний, толкаем всех на 10
                    $pos = $slice->first()->getPosition() + 10;

                    $slice->transform(function (ContainerElement $containerElement) use (&$pos) {
                        $containerElement->position = $pos;
                        $pos -= 10;

                        return $containerElement;
                    });
                }
            }
        }

        $newElement->save();

        return $newElement;
    }
}
