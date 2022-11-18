<?php

declare(strict_types=1);

namespace Domain\Core\Language\Root\Test\Model\Aggregate\Language;

use App\Base\Tests\UnitCase;
use App\Model\Roles\RoleHelper;
use App\Model\Roles\Root;
use Domain\Core\Language\Root\Control\Commands\CreateLanguage;
use Domain\Core\Language\Root\Model\Aggregates\RootLanguageImp;
use Domain\Core\Language\Root\Test\RootLanguageModuleHelper;

final class RootLanguageFactoryTest extends UnitCase
{
    private Root $root;

    public function setUp(): void
    {
        parent::setUp();

        $this->root = RoleHelper::createRoot();
    }

    public function testCreateNew()
    {
        $attributes = RootLanguageModuleHelper::new()->generateFullAttributes();
        $command = new CreateLanguage($attributes);
        $language =RootLanguageImp::new($this->root, $command);
        $this->assertInstanceOf(RootLanguageImp::class, $language);
    }
}
