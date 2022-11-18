<?php

declare(strict_types=1);

namespace Domain\Core\Language\Root\Test\Module;

use App\Base\Tests\ModuleCase;
use App\Model\Roles\RoleHelper;
use App\Model\Roles\Root;
use Domain\Core\Language\Root\Control\Queries\RootGetLanguagesImp;
use Domain\Core\Language\Root\Repository\RootLanguageRepository;
use Domain\Core\Language\Root\RootLanguageModuleImp;
use Domain\Core\Language\Root\Test\RootLanguageModuleHelper;
use Mockery\MockInterface;

final class RootLanguageModuleGetTest extends ModuleCase
{
    private RootLanguageModuleImp $languageModule;

    private Root $root;

    private RootGetLanguagesImp $query;

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
