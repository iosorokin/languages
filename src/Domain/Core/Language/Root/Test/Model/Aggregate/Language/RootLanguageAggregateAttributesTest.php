<?php

declare(strict_types=1);

namespace Domain\Core\Language\Root\Test\Model\Aggregate\Language;

use App\Base\Tests\UnitCase;
use App\Model\Values\Language\Code\CodeImp;
use App\Model\Values\Language\Name\NameImp;
use App\Model\Values\Language\NativeName\NativeNameImp;
use Domain\Core\Language\Root\Model\Aggregates\RootLanguage;
use Domain\Core\Language\Root\Test\RootLanguageModuleHelper;
use Illuminate\Support\Str;

final class RootLanguageAggregateAttributesTest extends UnitCase
{
    private RootLanguage $language;

    private array $attributes;

    public function setUp(): void
    {
        parent::setUp();

        $helper = RootLanguageModuleHelper::new();
        $this->attributes = $helper->generateFullAttributes();
        $this->language = $helper->createAggregate($this->attributes);
    }

    public function testReadOnlyValueObjectAttributes()
    {
        $this->assertNotSame($this->language->id(), $this->language->id());
        $this->assertNotSame($this->language->owner(), $this->language->owner());
        $this->assertNotSame($this->language->name(), $this->language->name());
        $this->assertNotSame($this->language->nativeName(), $this->language->nativeName());
        $this->assertNotSame($this->language->code(), $this->language->code());
        $this->assertNotSame($this->language->createdAt(), $this->language->createdAt());
    }

    public function testChangeName()
    {
        $name = NameImp::new($this->faker->name(Str::random(random_int(2, 32))));
        $this->language->changeName($name);
        $this->assertTrue($this->language->name()->compare($name));
    }

    public function testChangeNativeName()
    {
        $nativeName = NativeNameImp::new(Str::random(random_int(2, 32)));
        $this->language->changeNativeName($nativeName);
        $this->assertTrue($this->language->nativeName()->compare($nativeName));
    }

    public function testChangeCode()
    {
        $code = CodeImp::new(Str::random(random_int(2, 4)));
        $this->language->changeCode($code);
        $this->assertTrue($this->language->code()->compare($code));
    }

    public function testActive()
    {
        $this->language->deactivate();
        $this->assertFalse($this->language->isActive());
        $this->language->activate();
        $this->assertTrue($this->language->isActive());
    }
}
