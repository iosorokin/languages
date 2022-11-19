<?php

declare(strict_types=1);

namespace Domain\Core\Language\Base\Test\Module;

use App\Base\Test\TestCase;
use Domain\Core\Language\Base\Control\Query\FindLanguage;
use Domain\Core\Language\Base\LanguageModule;
use Domain\Core\Language\Base\LanguageModuleImp;
use Domain\Core\Language\Base\Model\Aggregate\ReadonlyLanguage;
use Domain\Core\Language\Base\Repository\LanguageRepository;
use Domain\Core\Language\Base\Test\LanguageAttributesTestHelper;
use Domain\Core\Language\Base\Test\LanguageUserCaseTestHelper;
use Infrastructure\Database\Structures\Language\LanguageStructureImp;
use Mockery\MockInterface;

final class LanguageModuleFindTest extends TestCase
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
        $this->query = LanguageUserCaseTestHelper::getFindQuery($structure->code());
        $this->mock(LanguageRepository::class, function (MockInterface $mock) use ($structure) {
            $mock->shouldReceive('find')
                ->andReturn($structure);
        });
    }
}
