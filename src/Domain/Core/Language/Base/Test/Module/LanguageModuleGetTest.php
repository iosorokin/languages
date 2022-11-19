<?php

declare(strict_types=1);

namespace Domain\Core\Language\Base\Test\Module;

use App\Base\Test\ModuleCase;
use Domain\Core\Language\Base\Control\Query\GetLanguages;
use Domain\Core\Language\Base\LanguageModule;
use Domain\Core\Language\Base\LanguageModuleImp;
use Domain\Core\Language\Base\Model\Collection\LanguageCollection;
use Domain\Core\Language\Base\Repository\LanguageRepository;
use Domain\Core\Language\Base\Test\LanguageFactoryTestHelper;
use Domain\Core\Language\Base\Test\LanguageUserCaseTestHelper;
use Domain\Core\Language\Root\Repository\RootLanguageRepository;
use Mockery\MockInterface;

final class LanguageModuleGetTest extends ModuleCase
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
        $this->query = LanguageUserCaseTestHelper::getQuery();
        $this->mock(LanguageRepository::class, function (MockInterface $mock) use ($languages) {
            $mock->shouldReceive('get')
                ->andReturn($languages);
        });
    }
}
