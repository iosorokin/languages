<?php

declare(strict_types=1);

namespace Domain\Core\Languages\Tests\Module;

use App\Base\Tests\ModuleCase;
use App\Roles\ContentManager;
use App\Values\Identificatiors\Id\BigIntId;
use App\Values\Identificatiors\Id\IntId;
use Domain\Core\Languages\Actions\Manager\Dto\CreateLanguageDto;
use Domain\Core\Languages\LanguageModuleProd;
use Domain\Core\Languages\Repositories\LanguageRepository;
use Domain\Core\Languages\Tests\LanguageSeedHelper;

/**
 * Стандартный кейс создания языка
 */
final class LanguageModuleCreateTest extends ModuleCase
{
    private const EXPECTING_LANGUAGE_ID = 1;

    private LanguageModuleProd $languageModule;

    private ContentManager $manager;

    private CreateLanguageDto $dto;

    /** @test */
    public function __invoke()
    {
        $id = $this->languageModule->managerCreate($this->manager, $this->dto);
        $this->assertSame(self::EXPECTING_LANGUAGE_ID, $id);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->languageModule = $this->app->make(LanguageModuleProd::class);
        $this->dto = LanguageSeedHelper::new()->getCreateLanguageDto();
        $this->manager = new class implements ContentManager {
            public function id(): IntId
            {
                return BigIntId::new(random_int(1, 10000));
            }

            public function isRoot(): bool
            {
                return false;
            }
        };

        $this->mock(LanguageRepository::class)
            ->shouldReceive('add')
            ->andReturn(self::EXPECTING_LANGUAGE_ID);
    }
}
