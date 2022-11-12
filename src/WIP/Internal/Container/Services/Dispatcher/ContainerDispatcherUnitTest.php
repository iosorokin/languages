<?php

declare(strict_types=1);

namespace WIP\Internal\Container\Services\Dispatcher;

use App\Base\Tests\ModuleCase;
use WIP\Core\Sentences\Model\Sentence;
use WIP\Internal\Container\Model\Container;
use WIP\Internal\Container\Presenters\Internal\InitWrapperContainer;

final class ContainerDispatcherUnitTest extends ModuleCase
{
    private ContainerManipulator $manipulator;

    protected function setUp(): void
    {
        parent::setUp();

        $containerable = new Container();
        $containerable->id = 1;
        /** @var InitWrapperContainer $presenter */
        $presenter = $this->app->make(InitWrapperContainer::class);
        $container = $presenter($containerable);
        /** @var ContainerDispatcher $dispatcher */
        $dispatcher = $this->app->make(ContainerDispatcher::class);
        $this->manipulator = $dispatcher->manipulate($container);
    }

    public function testPushed()
    {
        for ($i = 0; $i < 10; $i++) {
            $element = new Sentence();
            $element->id = $i + 1;
            $element = $this->manipulator->push($element);
            $expectedPos = $i * 10 + 1;
            $this->assertSame($expectedPos, $element->getPosition());
        }
    }

//    public function testInsertAfterThenContainerHasEmptySpace()
//    {
//        $manipulator = $this->dispatcher->manipulate(1);
//        for ($i = 0; $i < 10; $i++) {
//            $element = new SentenceModel();
//            $manipulator->push($element);
//        }
//
//        $insertedElement = new SentenceModel();
//        $insertAfterId = 4;
//        $newContainerElement = $manipulator->insertAfter($insertAfterId, $insertedElement);
//        $expectedPos = 36; // средня позиция между 4ым и 5ым элементом (31 и 41)
//        $this->assertSame($expectedPos, $newContainerElement->getPosition());
//    }
//
//    public function testInsertAfterThenContainerDoesNotHaveEmptySpaceAndSliceHasHeadElement()
//    {
//        $manipulator = $this->dispatcher->manipulate(1);
//        for ($i = 0; $i < 10; $i++) {
//            $element = new SentenceModel();
//            $element = $manipulator->push($element);
//            $element->setPosition($i + 1);
//        }
//
//        $insertedElement = new SentenceModel();
//        $insertAfterId = 4;
//        $newContainerElement = $manipulator->insertAfter($insertAfterId, $insertedElement);
//        $expectedPos = 41; // все сдвинулись на + 10,
//        $this->assertSame($expectedPos, $newContainerElement->getPosition());
//    }
//
//    public function testInsertAfterThenContainerDoesNotHaveEmptySpaceAndSliceDoestHaveHeadElement()
//    {
//        $manipulator = $this->dispatcher->manipulate(1);
//        for ($i = 0; $i < 10; $i++) {
//            $element = new SentenceModel();
//            $element = $manipulator->push($element);
//            if ($i >= 7) continue;
//            $element->setPosition($i + 1);
//        }
//
//        $insertedElement = new SentenceModel();
//        $insertAfterId = 4;
//        $newContainerElement = $manipulator->insertAfter($insertAfterId, $insertedElement);
//        $expectedPos = 41; // все сдвинулись на + 10,
//
//        // $this->assertSame($expectedPos, $newContainerElement->getPosition());
//    }
}
