<?php

declare(strict_types=1);

namespace Domain\Core\Language\Root\Test\Module;

use App\Base\Model\Roles\RoleHelper;
use App\Base\Test\TestCase;
use App\Exceptions\EntityNotFound;
use Domain\Core\Language\Base\Repository\LanguageRepository;
use Domain\Core\Language\Base\Test\LanguageUserCaseTestHelper;
use Domain\Core\Language\Root\Control\Dto\FindLanguageDto;
use Domain\Core\Language\Root\RootLanguageModule;
use Domain\Core\Language\Root\RootLanguageModuleImp;
use Mockery\MockInterface;

final class RootLanguageModuleFindOrFailTest extends TestCase
{
    private RootLanguageModule $module;

    private FindLanguageDto $query;

    /** @test */
    public function __invoke()
    {
        $this->expectException(EntityNotFound::class);
        $this->module->find($this->query);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->module = new RootLanguageModuleImp(RoleHelper::createRoot());
        $this->query = LanguageUserCaseTestHelper::getFindDto('code');
        $this->mock(LanguageRepository::class, function (MockInterface $mock) {
            $mock->shouldReceive('find')
                ->andReturnNull();
        });
    }
}
