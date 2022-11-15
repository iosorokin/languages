<?php

declare(strict_types=1);

namespace Domain\Root\Core\Language\Test\Module;

use App\Base\Tests\TestCase;
use App\Model\Roles\RoleHelper;
use App\Model\Roles\Root;
use Domain\Root\Core\Language\Control\Queries\RootFindLanguage;
use Domain\Root\Core\Language\Repository\RootLanguageRepository;
use Domain\Root\Core\Language\RootLanguageModuleProd;
use Domain\Root\Core\Language\Test\RootLanguageModuleHelper;
use Mockery\MockInterface;

final class RootLanguageModuleFindTest extends TestCase
{
    private RootLanguageModuleProd $languageModule;

    private Root $root;

    private RootFindLanguage $command;

    /** @test */
    public function __invoke()
    {
        $this->languageModule->find($this->root, $this->command);
        $this->assertTrue(true);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $helper = RootLanguageModuleHelper::new();

        $this->languageModule = $helper->module();
        $this->root = RoleHelper::createRoot();

        $language = $helper->createAggregate();
        $this->command = $helper->getFindLanguageQuery([
            'id' => $language->id()->toInt(),
        ]);
        $this->mock(RootLanguageRepository::class, function (MockInterface $mock) use ($language) {
            $mock->shouldReceive('find')
                ->andReturn($language);
        });
    }
}
