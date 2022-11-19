<?php

declare(strict_types=1);

namespace Domain\Core\Language\Root\Test\Model\Aggregate\Language;

use App\Base\Model\Roles\RoleHelper;
use App\Base\Model\Roles\Root;
use App\Base\Test\UnitCase;
use App\Controll\Language\Root\CreateLanguageImp;
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
        $command = new CreateLanguageImp($attributes);
        $language =RootLanguageImp::new($this->root, $command);
        $this->assertInstanceOf(RootLanguageImp::class, $language);
    }
}
