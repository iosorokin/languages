<?php

declare(strict_types=1);

namespace Domain\Core\Languages\Tests\Module;

use App\Base\Tests\ModuleCase;
use App\Roles\ContentManager;
use App\Roles\RoleHelper;
use Domain\Core\Languages\Actions\Manager\Dto\UpdateLanguageDto;
use Domain\Core\Languages\LanguageModuleProd;
use Domain\Core\Languages\Repositories\LanguageRepository;
use Domain\Core\Languages\Tests\LanguageSeedHelper;
use Mockery\MockInterface;

final class LanguageModuleUpdateTest extends ModuleCase
{
    private LanguageModuleProd $languageModule;

    private ContentManager $manager;

    private UpdateLanguageDto $dto;

    /** @test */
    public function __invoke()
    {
        $this->languageModule->managerUpdate($this->manager, $this->dto);
        $this->assertTrue(true);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $helper = LanguageSeedHelper::new();
        $this->languageModule = $helper->module();
        $this->manager = RoleHelper::createManager();
        $language = $helper->create();
        $this->dto = $helper->getUpdateLanguageDto([
            'id' => $language->id()->toInt(),
        ]);
        $this->mock(LanguageRepository::class, function (MockInterface $mock) use ($language) {
            $mock->shouldReceive('update')
                ->andReturnNull();
            $mock->shouldReceive('find')
                ->andReturn($language);
        });
    }
}
