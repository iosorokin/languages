<?php

declare(strict_types=1);

namespace Domain\Core\Language\Root\Tests\Module;

use App\Base\Tests\ModuleCase;
use App\Model\Roles\ContentManager;
use App\Model\Roles\RoleHelper;
use Domain\Core\Language\Root\Control\Commands\RootDeleteLanguage;
use Domain\Core\Language\Root\LanguageManagerModuleProd;
use Domain\Core\Language\Root\Repositories\ManagerLanguageRepository;
use Domain\Core\Language\Root\Tests\LanguageModuleHelper;
use Mockery\MockInterface;

final class RootLanguageModuleDeleteTest extends ModuleCase
{
    private LanguageManagerModuleProd $languageModule;

    private ContentManager $manager;

    private RootDeleteLanguage $command;

    /** @test */
    public function __invoke()
    {
        $this->languageModule->delete($this->manager, $this->command);
        $this->assertTrue(true);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $helper = LanguageModuleHelper::new();

        $this->languageModule = $helper->module();
        $this->manager = RoleHelper::createManager();

        $language = $helper->create();
        $this->command = $helper->getDeleteLanguageCommand([
            'id' => $language->id()->toInt(),
        ]);
        $this->mock(ManagerLanguageRepository::class, function (MockInterface $mock) use ($language) {
            $mock->shouldReceive('delete')
                ->andReturnNull();
            $mock->shouldReceive('find')
                ->andReturn($language);
        });
    }
}
