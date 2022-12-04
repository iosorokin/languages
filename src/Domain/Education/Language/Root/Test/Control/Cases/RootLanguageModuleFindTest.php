<?php

declare(strict_types=1);

namespace Domain\Education\Language\Root\Test\Control\Cases;

use Domain\Education\Language\Base\Control\Query\FindLanguage;
use Domain\Education\Language\Base\LanguageModule;
use Domain\Education\Language\Base\LanguageModuleImp;
use Domain\Education\Language\Base\Model\Aggregate\ReadonlyLanguage;
use Domain\Education\Language\Base\Repository\LanguageRepository;
use Domain\Education\Language\Base\Test\LanguageAttributesTestHelper;
use Domain\Education\Language\Base\Test\LanguageUserCaseTestHelper;
use Core\Base\Test\TestCase;
use Core\Infrastructure\Database\Structures\Language\LanguageStructureImp;
use Mockery\MockInterface;

final class RootLanguageModuleFindTest extends TestCase
{
    private const EXPECTING_CODE = 'code';

    private LanguageModule $module;

    private FindLanguage $query;

    /** @test */
    public function __invoke()
    {
        $language = $this->module->find($this->query);
        $this->assertInstanceOf(ReadonlyLanguage::class, $language);
        $this->assertSame(self::EXPECTING_CODE, (string) $language->code());
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->module = LanguageModuleImp::instance();
        $structure = LanguageStructureImp::newFromArray(LanguageAttributesTestHelper::full());
        $this->query = LanguageUserCaseTestHelper::getFindDto($structure->code());
        $this->mock(LanguageRepository::class, function (MockInterface $mock) use ($structure) {
            $mock->shouldReceive('find')
                ->andReturn($structure);
        });
    }
}
