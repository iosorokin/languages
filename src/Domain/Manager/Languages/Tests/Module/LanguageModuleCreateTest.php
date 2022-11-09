<?php

declare(strict_types=1);

namespace Domain\Manager\Languages\Tests\Module;

use App\Base\Tests\ModuleCase;
use App\Roles\ContentManager;
use App\Roles\RoleHelper;
use Domain\Core\Languages\Model\Manager\Commands\Manager\CreateLanguage;
use Domain\Core\Languages\Model\Manager\ManagerLanguageRepository;
use Domain\Manager\Languages\LanguageManagerModuleProd;
use Domain\Manager\Languages\Tests\LanguageManagerModuleHelper;

/**
 * Стандартный кейс создания языка
 */
final class LanguageModuleCreateTest extends ModuleCase
{
    private const EXPECTING_LANGUAGE_ID = 1;

    private LanguageManagerModuleProd $languageModule;

    private ContentManager $manager;

    private CreateLanguage $dto;

    /** @test */
    public function __invoke()
    {
        $id = $this->languageModule->create($this->manager, $this->dto);
        $this->assertSame(self::EXPECTING_LANGUAGE_ID, $id);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->languageModule = $this->app->make(LanguageManagerModuleProd::class);
        $this->dto = LanguageManagerModuleHelper::new()->getCreateLanguageCommand();
        $this->manager = RoleHelper::createManager();

        $this->mock(ManagerLanguageRepository::class)
            ->shouldReceive('add')
            ->andReturn(self::EXPECTING_LANGUAGE_ID);
    }
}
