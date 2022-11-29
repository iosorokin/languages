<?php

declare(strict_types=1);

namespace App\Education\Language\Root\Test\Control\Cases;

use App\Education\Language\Root\Control\Cases\Dto\DeleteLanguageDto;
use App\Education\Language\Root\Infrastructure\Database\LanguageRepository;
use App\Education\Language\Root\RootLanguageModuleImp;
use App\Education\Language\Root\Test\LanguageTestHelper;
use App\Education\Language\Shared\Test\RootLanguageModuleHelper;
use Core\Base\Model\Roles\RoleHelper;
use Core\Base\Model\Roles\Root;
use Core\Base\Test\ModuleCase;
use Mockery\MockInterface;

final class RootLanguageModuleDeleteTest extends ModuleCase
{
    private RootLanguageModuleImp $languageModule;

    private Root $root;

    private DeleteLanguageDto $dto;

    /** @test */
    public function __invoke()
    {
        $this->languageModule->delete($this->dto);
        $this->assertTrue(true);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->languageModule = new RootLanguageModuleImp(RoleHelper::createRoot());

        $language = LanguageTestHelper::createEntity();

        $this->dto =
        $this->mock(LanguageRepository::class, function (MockInterface $mock) use ($language) {
            $mock->shouldReceive('delete')
                ->andReturnNull();
            $mock->shouldReceive('find')
                ->andReturn($language);
        });
    }
}
