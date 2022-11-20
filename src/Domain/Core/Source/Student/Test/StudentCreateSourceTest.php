<?php

declare(strict_types=1);

namespace Domain\Core\Source\Student\Test;

use App\Base\Model\Values\Identificatiors\Id\BigIntId;
use App\Base\Test\UnitCase;
use Domain\Core\Source\Base\Repository\StudentSourceLanguageRepository;
use Domain\Core\Source\Base\Repository\SourceRepository;
use Domain\Core\Source\Base\Test\SourceSeedHelper;
use Domain\Core\Source\Student\Controll\Command\CreateSourceHandler;

final class StudentCreateSourceTest extends UnitCase
{
    private const EXPECTED_ID = 1;

    private SourceSeedHelper $helper;

    protected function setUp(): void
    {
        parent::setUp();
        $this->helper = SourceSeedHelper::new();

        $language = $this->helper->createLanguageEntity([
            'is_active' => true,
        ]);

        $this->mock(StudentSourceLanguageRepository::class)
            ->shouldReceive('find')
            ->andReturn($language);

        $this->mock(SourceRepository::class)
            ->shouldReceive('add')
            ->andReturn(BigIntId::new(self::EXPECTED_ID));
    }

    /** @test  */
    public function __invoke()
    {
        $command = $this->helper->getCreateSourceCommand();
        /** @var CreateSourceHandler $handler */
        $handler = $this->app->get(CreateSourceHandler::class);
        $id = $handler($command);

        $this->assertSame($id->toInt(),self::EXPECTED_ID);
    }
}
