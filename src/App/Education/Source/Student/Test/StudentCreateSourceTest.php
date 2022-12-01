<?php

declare(strict_types=1);

namespace App\Education\Source\Student\Test;

use App\Education\Source\Base\Repository\StudentSourceLanguageRepository;
use App\Education\Source\Student\Domain\Cases\CreateSourceHandler;
use App\Education\Source\Student\Infrastructure\Database\SourceRepository;
use App\Education\Source\Student\Test\Test\SourceSeedHelper;
use Core\Base\Model\Values\Identificatiors\Id\BigIntId;
use Core\Base\Test\UnitCase;

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
