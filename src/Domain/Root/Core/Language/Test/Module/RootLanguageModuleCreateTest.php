<?php

declare(strict_types=1);

namespace Domain\Root\Core\Language\Test\Module;

use App\Base\Tests\ModuleCase;
use App\Model\Roles\RoleHelper;
use App\Model\Roles\Root;
use Domain\Root\Core\Language\Control\Commands\RootCreateLanguage;
use Domain\Root\Core\Language\Repository\RootLanguageRepository;
use Domain\Root\Core\Language\RootLanguageModuleProd;
use Domain\Root\Core\Language\Test\RootLanguageModuleHelper;

/**
 * Стандартный кейс создания языка
 */
final class RootLanguageModuleCreateTest extends ModuleCase
{
    private const EXPECTING_LANGUAGE_ID = 1;

    private RootLanguageModuleProd $languageModule;

    private Root $root;

    private RootCreateLanguage $command;

    /** @test */
    public function __invoke()
    {
        $id = $this->languageModule->create($this->root, $this->command);
        $this->assertSame(self::EXPECTING_LANGUAGE_ID, $id);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->languageModule = $this->app->make(RootLanguageModuleProd::class);
        $this->command = RootLanguageModuleHelper::new()->getCreateLanguageCommand();
        $this->root = RoleHelper::createRoot();

        $this->mock(RootLanguageRepository::class)
            ->shouldReceive('add')
            ->andReturn(self::EXPECTING_LANGUAGE_ID);
    }
}
