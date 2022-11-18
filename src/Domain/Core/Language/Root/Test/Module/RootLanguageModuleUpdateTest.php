<?php

declare(strict_types=1);

namespace Domain\Core\Language\Root\Test\Module;

use App\Base\Tests\ModuleCase;
use App\Model\Roles\RoleHelper;
use App\Model\Roles\Root;
use Domain\Core\Language\Root\Control\Commands\UpdateLanguage;
use Domain\Core\Language\Root\Repository\RootLanguageRepository;
use Domain\Core\Language\Root\RootLanguageModuleImp;
use Domain\Core\Language\Root\Test\RootLanguageModuleHelper;
use Mockery\MockInterface;

final class RootLanguageModuleUpdateTest extends ModuleCase
{
    private RootLanguageModuleImp $languageModule;

    private Root $root;

    private UpdateLanguage $command;

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
        $this->mock(RootLanguageRepository::class, function (MockInterface $mock) use ($language) {
            $mock->shouldReceive('update')
                ->andReturnNull();
            $mock->shouldReceive('find')
                ->andReturn($language);
        });
    }
}
