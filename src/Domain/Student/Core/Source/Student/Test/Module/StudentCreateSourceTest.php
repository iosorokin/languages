<?php

declare(strict_types=1);

namespace Domain\Student\Core\Source\Student\Test\Module;

use App\Base\Tests\UnitCase;
use App\Model\Values\Identificatiors\Id\BigIntId;
use Domain\Student\Core\Language\Repositories\StudentLanguageRepository;
use Domain\Student\Core\Source\Student\Controll\Command\StudentCreateSourceHandler;
use Domain\Student\Core\Source\Student\Repository\StudentSourceRepository;
use Domain\Student\Core\Source\Student\Test\StudentSourceHelper;

final class StudentCreateSourceTest extends UnitCase
{
    private const EXPECTED_ID = 1;

    protected function setUp(): void
    {
        parent::setUp();

        $this->mock(StudentLanguageRepository::class)
            ->shouldReceive('canTakeToLearn')
            ->andReturnTrue();
        $this->mock(StudentSourceRepository::class)
            ->shouldReceive('add')
            ->andReturn(BigIntId::new(self::EXPECTED_ID));
    }

    /** @test  */
    public function __invoke()
    {
        $command = StudentSourceHelper::new()->getCreateSourceCommand();
        /** @var StudentCreateSourceHandler $handler */
        $handler = $this->app->get(StudentCreateSourceHandler::class);
        $id = $handler($command);

        $this->assertSame($id->toInt(),self::EXPECTED_ID);
    }
}
