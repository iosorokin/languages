<?php

declare(strict_types=1);

namespace App\Education\Language\Root\Test\Control\Cases;

use App\Education\Language\Base\Model\Value\Code\CodeImp;
use App\Education\Language\Root\Control\Cases\Dto\CreateLanguageDto;
use App\Education\Language\Root\Infrastructure\Database\LanguageRepository;
use App\Education\Language\Root\RootLanguageModuleImp;
use App\Education\Language\Root\Test\LanguageTestHelper;
use App\Education\Language\Shared\Test\RootLanguageModuleHelper;
use Core\Base\Model\Roles\RoleHelper;
use Core\Base\Test\ModuleCase;

/**
 * Стандартный кейс создания языка
 */
final class RootLanguageModuleCreateTest extends ModuleCase
{
    private const EXPECTING_LANGUAGE_CODE = 'code';

    private RootLanguageModuleImp $languageModule;

    private CreateLanguageDto $dto;

    /** @test */
    public function __invoke()
    {
        $language = $this->languageModule->create($this->dto);
        $this->assertSame(self::EXPECTING_LANGUAGE_CODE, $language->code()->get());
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->dto = CreateLanguageDto::new(LanguageTestHelper::generateCreateAttributes([
            'code' => self::EXPECTING_LANGUAGE_CODE,
        ]));
        $this->languageModule = new RootLanguageModuleImp(RoleHelper::createRoot());

        $this->mock(LanguageRepository::class)
            ->shouldReceive('add')
            ->andReturn(CodeImp::new(self::EXPECTING_LANGUAGE_CODE));
    }
}
