<?php

declare(strict_types=1);

namespace Domain\Core\Language\Root\Test\Module;

use App\Base\Tests\ModuleCase;
use App\Model\Roles\RoleHelper;
use App\Model\Roles\Root;
use Domain\Core\Language\Root\Control\Commands\DeleteLanguage;
use Domain\Core\Language\Root\LanguageModuleProd;
use Domain\Core\Language\Root\Repository\LanguageRepository;
use Domain\Core\Language\Root\Test\LanguageModuleHelper;
use Mockery\MockInterface;

final class RootLanguageModuleDeleteTest extends ModuleCase
{
    private LanguageModuleProd $languageModule;

    private Root $root;

    private DeleteLanguage $command;

    /** @test */
    public function __invoke()
    {
        $this->languageModule->delete($this->root, $this->command);
        $this->assertTrue(true);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $helper = LanguageModuleHelper::new();

        $this->languageModule = $helper->module();
        $this->root = RoleHelper::createRoot();

        $language = $helper->create();
        $this->command = $helper->getDeleteLanguageCommand([
            'id' => $language->id()->toInt(),
        ]);
        $this->mock(LanguageRepository::class, function (MockInterface $mock) use ($language) {
            $mock->shouldReceive('delete')
                ->andReturnNull();
            $mock->shouldReceive('find')
                ->andReturn($language);
        });
    }
}
