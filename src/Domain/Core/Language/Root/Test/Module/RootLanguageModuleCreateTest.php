<?php

declare(strict_types=1);

namespace Domain\Core\Language\Root\Test\Module;

use App\Base\Model\Roles\RoleHelper;
use App\Base\Model\Roles\Root;
use App\Base\Model\Values\Identificatiors\Id\BigIntId;
use App\Base\Test\ModuleCase;
use App\Controll\Language\Root\CreateLanguageImp;
use Domain\Core\Language\Root\Repository\RootLanguageRepository;
use Domain\Core\Language\Root\RootLanguageModuleImp;
use Domain\Core\Language\Root\Test\RootLanguageModuleHelper;

/**
 * Стандартный кейс создания языка
 */
final class RootLanguageModuleCreateTest extends ModuleCase
{
    private const EXPECTING_LANGUAGE_CODE = 'code';

    private RootLanguageModuleImp $languageModule;

    private Root $root;

    private CreateLanguageImp $command;

    /** @test */
    public function __invoke()
    {
        $language = $this->languageModule->create($this->root, $this->command);
        $this->assertSame(self::EXPECTING_LANGUAGE_CODE, $language->code());
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->languageModule = $this->app->make(RootLanguageModuleImp::class);
        $this->command = RootLanguageModuleHelper::new()->getCreateLanguageCommand();
        $this->root = RoleHelper::createRoot();

        $this->mock(RootLanguageRepository::class)
            ->shouldReceive('add')
            ->andReturn(BigIntId::new(self::EXPECTING_LANGUAGE_CODE));
    }
}
