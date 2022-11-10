<?php

declare(strict_types=1);

namespace Domain\Core\Language\Root\Tests\Module;

use App\Base\Tests\ModuleCase;
use App\Model\Roles\ContentManager;
use App\Model\Roles\RoleHelper;
use Domain\Core\Language\Root\Control\Commands\RootCreateLanguage;
use Domain\Core\Language\Root\LanguageManagerModuleProd;
use Domain\Core\Language\Root\Repositories\ManagerLanguageRepository;
use Domain\Core\Language\Root\Tests\LanguageModuleHelper;

/**
 * Стандартный кейс создания языка
 */
final class RootLanguageModuleCreateTest extends ModuleCase
{
    private const EXPECTING_LANGUAGE_ID = 1;

    private LanguageManagerModuleProd $languageModule;

    private ContentManager $manager;

    private RootCreateLanguage $command;

    /** @test */
    public function __invoke()
    {
        $id = $this->languageModule->create($this->manager, $this->command);
        $this->assertSame(self::EXPECTING_LANGUAGE_ID, $id);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->languageModule = $this->app->make(LanguageManagerModuleProd::class);
        $this->command = LanguageModuleHelper::new()->getCreateLanguageCommand();
        $this->manager = RoleHelper::createManager();

        $this->mock(ManagerLanguageRepository::class)
            ->shouldReceive('add')
            ->andReturn(self::EXPECTING_LANGUAGE_ID);
    }
}
