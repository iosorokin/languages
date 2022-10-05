<?php

declare(strict_types=1);

namespace Modules\Container\Services\Dispatcher;

use Core\Base\Tests\UnitCase;
use Illuminate\Support\Collection;
use Modules\Container\Entites\ContainerModel;
use Modules\Container\Repositories\ContainerRepository;
use Modules\Container\Repositories\FakeContainerRepository;
use Modules\Education\Rules\Entities\RuleModel;

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
        $manipulator = $this->dispatcher->load(1);
        for ($i = 0; $i < 10; $i++) {
            $element = new RuleModel();
            $element = $manipulator->push($element);

            $expectedPos = $i * 10 + 1;
            $this->assertSame($expectedPos, $element->getPosition());
        }
    }

    public function testInsertAfterThenContainerHasEmptySpace()
    {
        $manipulator = $this->dispatcher->load(1);
        for ($i = 0; $i < 10; $i++) {
            $element = new RuleModel();
            $manipulator->push($element);
        }

        $insertedElement = new RuleModel();
        $insertAfterId = 4;
        $newContainerElement = $manipulator->insertAfter($insertAfterId, $insertedElement);
        $expectedPos = 36; // средня позиция между 4ым и 5ым элементом (31 и 41)
        $this->assertSame($expectedPos, $newContainerElement->getPosition());
    }

    public function testInsertAfterThenContainerDoesNotHaveEmptySpaceAndSliceHasHeadElement()
    {
        $manipulator = $this->dispatcher->load(1);
        for ($i = 0; $i < 10; $i++) {
            $element = new RuleModel();
            $element = $manipulator->push($element);
            $element->setPosition($i + 1);
        }

        $insertedElement = new RuleModel();
        $insertAfterId = 4;
        $newContainerElement = $manipulator->insertAfter($insertAfterId, $insertedElement);
        $expectedPos = 41; // все сдвинулись на + 10,
        $this->assertSame($expectedPos, $newContainerElement->getPosition());
    }

    public function testInsertAfterThenContainerDoesNotHaveEmptySpaceAndSliceDoestHaveHeadElement()
    {
        $manipulator = $this->dispatcher->load(1);
        for ($i = 0; $i < 10; $i++) {
            $element = new RuleModel();
            $element = $manipulator->push($element);
            if ($i >= 7) continue;
            $element->setPosition($i + 1);
        }

        $insertedElement = new RuleModel();
        $insertAfterId = 4;
        $newContainerElement = $manipulator->insertAfter($insertAfterId, $insertedElement);
        $expectedPos = 41; // все сдвинулись на + 10,

        // $this->assertSame($expectedPos, $newContainerElement->getPosition());
    }
}
