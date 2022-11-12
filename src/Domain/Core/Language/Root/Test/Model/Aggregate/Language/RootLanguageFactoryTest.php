<?php

declare(strict_types=1);

namespace Domain\Core\Language\Root\Test\Model\Aggregate\Language;

use App\Base\Tests\UnitCase;
use App\Model\Roles\RoleHelper;
use App\Model\Roles\Root;
use Domain\Core\Language\Root\Control\Commands\RootCreateLanguage;
use Domain\Core\Language\Root\Model\Aggregates\RootLanguage;
use Domain\Core\Language\Root\Model\Aggregates\RootLanguageFactory;
use Domain\Core\Language\Root\Test\RootLanguageModuleHelper;

final class RootLanguageFactoryTest extends UnitCase
{
    private RootLanguageFactory $factory;

    private Root $root;

    public function setUp(): void
    {
        parent::setUp();

        $this->factory = $this->app->make(RootLanguageFactory::class);
        $this->root = RoleHelper::createRoot();
    }

    public function testCreateNew()
    {
        $attributes = RootLanguageModuleHelper::new()->generateFullAttributes();
        $command = new RootCreateLanguage($attributes);
        $language = $this->factory->new($this->root, $command);
        $this->assertInstanceOf(RootLanguage::class, $language);
    }
}
