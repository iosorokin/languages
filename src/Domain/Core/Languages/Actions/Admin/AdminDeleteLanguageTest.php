<?php

declare(strict_types=1);

namespace Domain\Core\Languages\Actions\Admin;

use App\Base\Tests\UnitCase;
use App\Repositories\Eloquent\Language\LanguageRepository;
use App\Values\Identificatiors\Id\BigIntId;
use Domain\Core\Languages\Helpers\Test\LanguageSeedHelper;
use Domain\Support\Authorization\Manager;

final class AdminDeleteLanguageTest extends UnitCase
{
    public function testDeleteLanguage()
    {
        $language = LanguageSeedHelper::new()->create();
        $this->mock(LanguageRepository::class)
            ->shouldReceive('get')
            ->andReturn($language);

        $manager = new Manager(
            BigIntId::new(1)
        );
        /** @var AdminDeleteLanguage $action */
        $action = $this->app->make(AdminDeleteLanguage::class);
        $action($manager, 1);
        $this->assertTrue(true);
    }
}
