<?php

declare(strict_types=1);

namespace Domain\Core\Language\Root\Test\Module;

use App\Base\Test\ModuleCase;
use Domain\Core\Language\Base\Control\Query\GetLanguages;
use Domain\Core\Language\Base\LanguageModule;
use Domain\Core\Language\Base\LanguageModuleImp;
use Domain\Core\Language\Base\Model\Collection\LanguageCollection;
use Domain\Core\Language\Base\Test\LanguageFactoryTestHelper;
use Domain\Core\Language\Base\Test\LanguageUserCaseTestHelper;
use Mockery\MockInterface;

final class RootLanguageModuleGetTest extends ModuleCase
{
    private const EXPECTING_COUNT_LANGUAGES = 50;

    private LanguageModule $languageModule;

    private GetLanguages $query;

    /** @test */
    public function __invoke()
    {
        $collection = $this->languageModule->get($this->query);

        $this->assertInstanceOf(LanguageCollection::class, $collection);
        $this->assertSame(self::EXPECTING_COUNT_LANGUAGES, $collection->count());
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->languageModule = LanguageModuleImp::instance();
        $languages = LanguageFactoryTestHelper::collection(self::EXPECTING_COUNT_LANGUAGES);
        $this->query = LanguageUserCaseTestHelper::getQueryDto();
        $this->mock(\Domain\Core\Language\Base\Test\Module\LanguageRepository::class, function (MockInterface $mock) use ($languages) {
            $mock->shouldReceive('get')
                ->andReturn($languages);
        });
    }
}
