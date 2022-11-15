<?php

declare(strict_types=1);

namespace Domain\Guest\Core\Language\Tests\Module;

use App\Base\Tests\TestCase;
use Domain\Guest\Core\Language\Control\Queries\GuestFindLanguage;
use Domain\Guest\Core\Language\GuestLanguageModuleProd;
use Domain\Guest\Core\Language\Repository\GuestLanguageRepository;
use Domain\Guest\Core\Language\Tests\GuestLanguageModuleHelper;
use Mockery\MockInterface;

final class GuestLanguageModuleFindTest extends TestCase
{
    private GuestLanguageModuleProd $languageModule;

    private GuestFindLanguage $query;

    /** @test */
    public function __invoke()
    {
        $this->languageModule->find($this->query);
        $this->assertTrue(true);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $helper = GuestLanguageModuleHelper::new();

        $this->languageModule = $helper->module();

        $language = $helper->createAggregate();
        $this->query = $helper->getFindLanguageQuery([
            'code' => $language->code()->get(),
        ]);
        $this->mock(GuestLanguageRepository::class, function (MockInterface $mock) use ($language) {
            $mock->shouldReceive('find')
                ->andReturn($language);
        });
    }
}
