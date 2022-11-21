<?php

declare(strict_types=1);

namespace Domain\Core\Language\Root\Test\Module;

use App\Base\Model\Roles\RoleHelper;
use App\Base\Model\Roles\Root;
use App\Base\Model\Values\Identificatiors\Id\BigIntId;
use App\Base\Test\ModuleCase;
use Domain\Core\Language\Base\Model\Value\Code\CodeImp;
use Domain\Core\Language\Root\Control\Dto\CreateLanguageDto;
use Domain\Core\Language\Root\Repository\LanguageRepository;
use Domain\Core\Language\Root\RootLanguageModuleImp;
use Domain\Core\Language\Root\Test\RootLanguageModuleHelper;

/**
 * Стандартный кейс создания языка
 */
final class RootLanguageModuleCreateTest extends ModuleCase
{
    private const EXPECTING_LANGUAGE_CODE = 'code';

    private RootLanguageModuleImp $languageModule;

    private CreateLanguageDto $command;

    /** @test */
    public function __invoke()
    {
        $language = $this->languageModule->create($this->command);
        $this->assertSame(self::EXPECTING_LANGUAGE_CODE, $language->code());
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->command = RootLanguageModuleHelper::new()->getCreateLanguageCommand();
        $this->languageModule = new RootLanguageModuleImp(RoleHelper::createRoot());

        $this->mock(LanguageRepository::class)
            ->shouldReceive('add')
            ->andReturn(CodeImp::new(self::EXPECTING_LANGUAGE_CODE));
    }
}
