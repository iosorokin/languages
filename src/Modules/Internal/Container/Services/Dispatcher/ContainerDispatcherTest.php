<?php

declare(strict_types=1);

namespace Modules\Internal\Container\Services\Dispatcher;

use Core\Base\Tests\UnitCase;
use Illuminate\Support\Collection;
use Modules\Domain\Sentences\Entities\SentenceModel;
use Modules\Internal\Container\Entites\ContainerModel;
use Modules\Internal\Container\Repositories\ContainerRepository;
use Modules\Internal\Container\Repositories\FakeContainerRepository;

final class ContainerDispatcherTest extends UnitCase
{
    private ContainerDispatcher $dispatcher;

    protected function setUp(): void
    {
        parent::setUp();

        $this->app->bind(ContainerRepository::class, FakeContainerRepository::class);
        FakeContainerRepository::reset();
        $this->dispatcher = app()->make(ContainerDispatcher::class);
        $container = new ContainerModel();
        $container->elements = new Collection();
        $this->dispatcher->add($container);
    }

    public function testPushed()
    {
        $manipulator = $this->dispatcher->manipulate(1);
        for ($i = 0; $i < 10; $i++) {
            $element = new SentenceModel();
            $element = $manipulator->push($element);

            $expectedPos = $i * 10 + 1;
            $this->assertSame($expectedPos, $element->getPosition());
        }
    }

    public function testInsertAfterThenContainerHasEmptySpace()
    {
        $manipulator = $this->dispatcher->manipulate(1);
        for ($i = 0; $i < 10; $i++) {
            $element = new SentenceModel();
            $manipulator->push($element);
        }

        $insertedElement = new SentenceModel();
        $insertAfterId = 4;
        $newContainerElement = $manipulator->insertAfter($insertAfterId, $insertedElement);
        $expectedPos = 36; // средня позиция между 4ым и 5ым элементом (31 и 41)
        $this->assertSame($expectedPos, $newContainerElement->getPosition());
    }

    public function testInsertAfterThenContainerDoesNotHaveEmptySpaceAndSliceHasHeadElement()
    {
        $manipulator = $this->dispatcher->manipulate(1);
        for ($i = 0; $i < 10; $i++) {
            $element = new SentenceModel();
            $element = $manipulator->push($element);
            $element->setPosition($i + 1);
        }

        $insertedElement = new SentenceModel();
        $insertAfterId = 4;
        $newContainerElement = $manipulator->insertAfter($insertAfterId, $insertedElement);
        $expectedPos = 41; // все сдвинулись на + 10,
        $this->assertSame($expectedPos, $newContainerElement->getPosition());
    }

    public function testInsertAfterThenContainerDoesNotHaveEmptySpaceAndSliceDoestHaveHeadElement()
    {
        $manipulator = $this->dispatcher->manipulate(1);
        for ($i = 0; $i < 10; $i++) {
            $element = new SentenceModel();
            $element = $manipulator->push($element);
            if ($i >= 7) continue;
            $element->setPosition($i + 1);
        }

        $insertedElement = new SentenceModel();
        $insertAfterId = 4;
        $newContainerElement = $manipulator->insertAfter($insertAfterId, $insertedElement);
        $expectedPos = 41; // все сдвинулись на + 10,

        // $this->assertSame($expectedPos, $newContainerElement->getPosition());
    }
}
