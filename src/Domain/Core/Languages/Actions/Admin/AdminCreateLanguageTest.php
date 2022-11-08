<?php

declare(strict_types=1);

namespace Domain\Core\Languages\Actions\Admin;

use App\Base\Tests\TestCase;
use App\Repositories\Eloquent\Language\LanguageRepository;
use App\Values\Identificatiors\Id\BigIntId;
use Domain\Core\Languages\Authorization\LanguageAuthorization;
use Domain\Core\Languages\Helpers\Test\LanguageSeedHelper;
use Domain\Support\Authorization\Manager;

final class AdminCreateLanguageTest extends TestCase
{
    public function testCreate()
    {
        $expectedId = 1;

        $this->mock(LanguageAuthorization::class)
            ->shouldReceive('checkRoot')
            ->andReturn(true);

        $this->mock(LanguageRepository::class)
            ->shouldReceive('add')
            ->andReturn($expectedId);

        /** @var AdminCreateLanguage $action */
        $action = $this->app->make(AdminCreateLanguage::class);
        $dto = LanguageSeedHelper::new()->createDto();
        $id = $action(
            new Manager(
                BigIntId::new(random_int(1, 10000))
            ),
            $dto
        );

        $this->assertSame(1, $id);
    }
}
