<?php

declare(strict_types=1);

namespace Domain\Core\Language\Student\Tests\Module;

use App\Base\Tests\ModuleCase;
use App\Model\Roles\RoleHelper;
use App\Model\Roles\Root;
use Domain\Core\Language\Root\Control\Queries\FindLanguage;
use Domain\Core\Language\Root\Control\Queries\GetLanguages;
use Domain\Core\Language\Root\Repository\LanguageRepository;
use Domain\Core\Language\Root\LanguageModuleProd;
use Domain\Core\Language\Root\Test\LanguageModuleHelper;
use Mockery\MockInterface;

final class StudentLanguageModuleGetTest extends ModuleCase
{
    private LanguageModuleProd $languageModule;

    private Root $root;

    private GetLanguages $query;

    /** @test */
    public function __invoke()
    {
        $this->languageModule->get($this->root, $this->query);
        $this->assertTrue(true);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $helper = LanguageModuleHelper::new();

        $this->languageModule = $helper->module();
        $this->root = RoleHelper::createRoot();

        $language = $helper->create();
        $this->query = $helper->getLanguagesQuery();
        $this->mock(LanguageRepository::class, function (MockInterface $mock) use ($language) {
            $mock->shouldReceive('find')
                ->andReturn($language);
        });
    }
}
