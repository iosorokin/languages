<?php

declare(strict_types=1);

namespace Domain\Manager\Languages\Tests\Module;

use App\Base\Tests\ModuleCase;
use App\Roles\ContentManager;
use App\Roles\RoleHelper;
use Domain\Core\Languages\Model\Manager\Commands\Manager\UpdateLanguage;
use Domain\Core\Languages\Model\Manager\ManagerLanguageRepository;
use Domain\Manager\Languages\LanguageManagerModuleProd;
use Domain\Manager\Languages\Tests\LanguageManagerModuleHelper;
use Mockery\MockInterface;

final class LanguageModuleUpdateTest extends ModuleCase
{
    private LanguageManagerModuleProd $languageModule;

    private ContentManager $manager;

    private UpdateLanguage $dto;

    /** @test */
    public function __invoke()
    {
        $this->languageModule->update($this->manager, $this->dto);
        $this->assertTrue(true);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $helper = LanguageManagerModuleHelper::new();
        $this->languageModule = $helper->module();
        $this->manager = RoleHelper::createManager();
        $language = $helper->create();
        $this->dto = $helper->getUpdateLanguageCommand([
            'id' => $language->id()->toInt(),
        ]);
        $this->mock(ManagerLanguageRepository::class, function (MockInterface $mock) use ($language) {
            $mock->shouldReceive('update')
                ->andReturnNull();
            $mock->shouldReceive('find')
                ->andReturn($language);
        });
    }
}
