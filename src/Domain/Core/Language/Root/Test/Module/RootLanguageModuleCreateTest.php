<?php

declare(strict_types=1);

namespace Domain\Core\Language\Root\Test\Module;

use App\Base\Tests\ModuleCase;
use App\Model\Roles\RoleHelper;
use App\Model\Roles\Root;
use Domain\Core\Language\Root\Control\Commands\CreateLanguage;
use Domain\Core\Language\Root\LanguageModuleProd;
use Domain\Core\Language\Root\Repository\LanguageRepository;
use Domain\Core\Language\Root\Test\LanguageModuleHelper;

/**
 * Стандартный кейс создания языка
 */
final class RootLanguageModuleCreateTest extends ModuleCase
{
    private const EXPECTING_LANGUAGE_ID = 1;

    private LanguageModuleProd $languageModule;

    private Root $root;

    private CreateLanguage $command;

    /** @test */
    public function __invoke()
    {
        $id = $this->languageModule->create($this->root, $this->command);
        $this->assertSame(self::EXPECTING_LANGUAGE_ID, $id);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->languageModule = $this->app->make(LanguageModuleProd::class);
        $this->command = LanguageModuleHelper::new()->getCreateLanguageCommand();
        $this->root = RoleHelper::createRoot();

        $this->mock(LanguageRepository::class)
            ->shouldReceive('add')
            ->andReturn(self::EXPECTING_LANGUAGE_ID);
    }
}
