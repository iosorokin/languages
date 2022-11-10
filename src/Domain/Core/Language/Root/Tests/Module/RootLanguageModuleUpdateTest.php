<?php

declare(strict_types=1);

namespace Domain\Core\Language\Root\Tests\Module;

use App\Base\Tests\ModuleCase;
use App\Roles\ContentManager;
use App\Roles\RoleHelper;
use Domain\Core\Language\Root\Control\Commands\RootUpdateLanguage;
use Domain\Core\Language\Root\LanguageManagerModuleProd;
use Domain\Core\Language\Root\Repositories\ManagerLanguageRepository;
use Domain\Core\Language\Root\Tests\LanguageModuleHelper;
use Mockery\MockInterface;

final class RootLanguageModuleUpdateTest extends ModuleCase
{
    private LanguageManagerModuleProd $languageModule;

    private ContentManager $manager;

    private RootUpdateLanguage $command;

    /** @test */
    public function __invoke()
    {
        $this->languageModule->update($this->manager, $this->command);
        $this->assertTrue(true);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $helper = LanguageModuleHelper::new();
        $this->languageModule = $helper->module();
        $this->manager = RoleHelper::createManager();
        $language = $helper->create();
        $this->command = $helper->getUpdateLanguageCommand([
            'id' => $language->id()->toInt(),
        ]);
        $this->mock(ManagerLanguageRepository::class, function (MockInterface $mock) use ($language) {
            $mock->shouldReceive('update')
                ->andReturnNull();
            $mock->shouldReceive('find')
                ->andReturn($language);
        });
    }
}
