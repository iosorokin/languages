<?php

declare(strict_types=1);

namespace App\Education\Language\Root\Test\Domain\Model;

use Core\Base\Test\UnitCase;
use App\Education\Language\Base\Model\Value\Code\CodeImp;
use App\Education\Language\Base\Model\Value\Name\NameImp;
use App\Education\Language\Base\Model\Value\NativeName\NativeNameImp;
use App\Education\Language\Root\Domain\Model\Language;
use App\Education\Language\Root\Test\LanguageTestHelper;
use Illuminate\Support\Str;

final class RootLanguageTest extends UnitCase
{
    private Language $language;

    public function setUp(): void
    {
        parent::setUp();

        $this->language = LanguageTestHelper::createEntity();
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
        $this->language->draft();
        $this->assertTrue($this->language->status()->isDraft());
        $this->language->activate();
        $this->assertTrue($this->language->status()->isActive());
    }
}
