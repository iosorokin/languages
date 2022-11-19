<?php

declare(strict_types=1);

namespace Domain\Core\Language\Root\Test\Module;

use App\Base\Model\Roles\RoleHelper;
use App\Base\Model\Roles\Root;
use App\Base\Test\ModuleCase;
use App\Controll\Language\Root\DeleteLanguageImp;
use Domain\Core\Language\Root\Repository\RootLanguageRepository;
use Domain\Core\Language\Root\RootLanguageModuleImp;
use Domain\Core\Language\Root\Test\RootLanguageModuleHelper;
use Mockery\MockInterface;

final class RootLanguageModuleDeleteTest extends ModuleCase
{
    private RootLanguageModuleImp $languageModule;

    private Root $root;

    private DeleteLanguageImp $command;

    /** @test */
    public function __invoke()
    {
        $this->languageModule->delete($this->root, $this->command);
        $this->assertTrue(true);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $helper = RootLanguageModuleHelper::new();

        $this->languageModule = $helper->module();
        $this->root = RoleHelper::createRoot();

        $language = $helper->createAggregate();
        $this->command = $helper->getDeleteLanguageCommand([
            'id' => $language->id()->toInt(),
        ]);
        $this->mock(RootLanguageRepository::class, function (MockInterface $mock) use ($language) {
            $mock->shouldReceive('delete')
                ->andReturnNull();
            $mock->shouldReceive('find')
                ->andReturn($language);
        });
    }
}
