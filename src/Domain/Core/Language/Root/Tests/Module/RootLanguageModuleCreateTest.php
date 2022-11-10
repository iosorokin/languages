<?php

declare(strict_types=1);

namespace Domain\Core\Language\Root\Tests\Module;

use App\Base\Tests\ModuleCase;
use App\Model\Roles\RoleHelper;
use App\Model\Roles\Root;
use Domain\Core\Language\Root\Control\Commands\RootCreateLanguage;
use Domain\Core\Language\Root\RootLanguageModuleProd;
use Domain\Core\Language\Root\Repositories\RootLanguageRepository;
use Domain\Core\Language\Root\Tests\LanguageModuleHelper;

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
        $this->command = LanguageModuleHelper::new()->getCreateLanguageCommand();
        $this->root = RoleHelper::createRoot();

        $this->mock(RootLanguageRepository::class)
            ->shouldReceive('add')
            ->andReturn(self::EXPECTING_LANGUAGE_ID);
    }
}
