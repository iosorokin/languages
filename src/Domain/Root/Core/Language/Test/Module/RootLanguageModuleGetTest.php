<?php

declare(strict_types=1);

namespace Domain\Root\Core\Language\Test\Module;

use App\Base\Tests\ModuleCase;
use App\Model\Roles\RoleHelper;
use App\Model\Roles\Root;
use Domain\Root\Core\Language\Control\Queries\RootGetLanguages;
use Domain\Root\Core\Language\Repository\RootLanguageRepository;
use Domain\Root\Core\Language\RootLanguageModuleProd;
use Domain\Root\Core\Language\Test\RootLanguageModuleHelper;
use Mockery\MockInterface;

final class RootLanguageModuleGetTest extends ModuleCase
{
    private RootLanguageModuleProd $languageModule;

    private Root $root;

    private RootGetLanguages $query;

    /** @test */
    public function __invoke()
    {
        $this->languageModule->get($this->root, $this->query);
        $this->assertTrue(true);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $helper = RootLanguageModuleHelper::new();

        $this->languageModule = $helper->module();
        $this->root = RoleHelper::createRoot();
        $languages = $helper->createCollection(100);
        $this->query = $helper->getLanguagesQuery();
        $this->mock(RootLanguageRepository::class, function (MockInterface $mock) use ($languages) {
            $mock->shouldReceive('get')
                ->andReturn($languages);
        });
    }
}
