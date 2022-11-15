<?php

declare(strict_types=1);

namespace Domain\Root\Core\Language\Test\Model\Aggregate\Language;

use App\Base\Tests\UnitCase;
use App\Model\Roles\RoleHelper;
use App\Model\Roles\Root;
use Domain\Root\Core\Language\Control\Commands\RootCreateLanguage;
use Domain\Root\Core\Language\Model\Aggregates\RootLanguage;
use Domain\Root\Core\Language\Model\Aggregates\RootLanguageFactory;
use Domain\Root\Core\Language\Test\RootLanguageModuleHelper;

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
