<?php

declare(strict_types=1);

namespace App\Education\Language\Root\Test\Control\Cases;

use App\Education\Language\Root\Control\Cases\Dto\UpdateLanguageDto;
use App\Education\Language\Root\Infrastructure\Database\LanguageRepository;
use App\Education\Language\Root\RootLanguageModuleImp;
use App\Education\Language\Shared\Test\RootLanguageModuleHelper;
use Core\Base\Model\Roles\RoleHelper;
use Core\Base\Model\Roles\Root;
use Core\Base\Test\ModuleCase;
use Mockery\MockInterface;

final class RootLanguageModuleUpdateTest extends ModuleCase
{
    private RootLanguageModuleImp $languageModule;

    private Root $root;

    private UpdateLanguageDto $command;

    /** @test */
    public function __invoke()
    {
        $this->languageModule->update($this->root, $this->command);
        $this->assertTrue(true);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $helper = RootLanguageModuleHelper::new();
        $this->languageModule = $helper->module();
        $this->root = RoleHelper::createRoot();
        $language = $helper->createAggregate();
        $this->command = $helper->getUpdateLanguageCommand([
            'id' => $language->id()->toInt(),
        ]);
        $this->mock(LanguageRepository::class, function (MockInterface $mock) use ($language) {
            $mock->shouldReceive('update')
                ->andReturnNull();
            $mock->shouldReceive('find')
                ->andReturn($language);
        });
    }
}
