<?php

declare(strict_types=1);

namespace Domain\Core\Language\Root\Tests\Module;

use App\Base\Tests\ModuleCase;
use App\Model\Roles\ContentManager;
use App\Model\Roles\RoleHelper;
use App\Model\Roles\Root;
use Domain\Core\Language\Root\Control\Commands\RootUpdateLanguage;
use Domain\Core\Language\Root\LanguageModuleProd;
use Domain\Core\Language\Root\Repositories\LanguageRepository;
use Domain\Core\Language\Root\Tests\LanguageModuleHelper;
use Mockery\MockInterface;

final class RootLanguageModuleUpdateTest extends ModuleCase
{
    private LanguageModuleProd $languageModule;

    private Root $root;

    private RootUpdateLanguage $command;

    /** @test */
    public function __invoke()
    {
        $this->languageModule->update($this->root, $this->command);
        $this->assertTrue(true);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $helper = LanguageModuleHelper::new();
        $this->languageModule = $helper->module();
        $this->root = RoleHelper::createRoot();
        $language = $helper->create();
        $this->command = $helper->getUpdateLanguageCommand([
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
