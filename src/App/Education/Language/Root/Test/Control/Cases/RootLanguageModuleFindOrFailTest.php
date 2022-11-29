<?php

declare(strict_types=1);

namespace App\Education\Language\Root\Test\Control\Cases;

use App\Education\Language\Base\Repository\LanguageRepository;
use App\Education\Language\Base\Test\LanguageUserCaseTestHelper;
use App\Education\Language\Root\Control\Cases\Dto\GetLanguageDto;
use App\Education\Language\Root\RootLanguageModule;
use App\Education\Language\Root\RootLanguageModuleImp;
use App\Exceptions\EntityNotFound;
use Core\Base\Model\Roles\RoleHelper;
use Core\Base\Test\TestCase;
use Mockery\MockInterface;

final class RootLanguageModuleFindOrFailTest extends TestCase
{
    private RootLanguageModule $module;

    private GetLanguageDto $query;

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
