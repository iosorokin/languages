<?php

declare(strict_types=1);

namespace Domain\Core\Language\Guest\Tests\Module;

use App\Base\Tests\TestCase;
use Domain\Core\Language\Guest\Control\Queries\GuestFindLanguage;
use Domain\Core\Language\Guest\GuestLanguageModuleProd;
use Domain\Core\Language\Guest\Repository\GuestLanguageRepository;
use Domain\Core\Language\Guest\Tests\GuestLanguageModuleHelper;
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
