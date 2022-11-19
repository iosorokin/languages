<?php

declare(strict_types=1);

namespace Domain\Core\Language\Base\Test\Module;

use App\Base\Test\TestCase;
use App\Exceptions\EntityNotFound;
use Domain\Core\Language\Base\Control\Query\FindLanguage;
use Domain\Core\Language\Base\LanguageModule;
use Domain\Core\Language\Base\LanguageModuleImp;
use Domain\Core\Language\Base\Repository\LanguageRepository;
use Domain\Core\Language\Base\Test\LanguageUserCaseTestHelper;
use Mockery\MockInterface;

final class LanguageModuleFindOrFailTest extends TestCase
{
    private LanguageModule $module;

    private FindLanguage $query;

    /** @test */
    public function __invoke()
    {
        $this->expectException(EntityNotFound::class);
        $this->module->find($this->query);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->module = LanguageModuleImp::instance();
        $this->query = LanguageUserCaseTestHelper::getFindQuery('code');
        $this->mock(LanguageRepository::class, function (MockInterface $mock) {
            $mock->shouldReceive('find')
                ->andReturnNull();
        });
    }
}
