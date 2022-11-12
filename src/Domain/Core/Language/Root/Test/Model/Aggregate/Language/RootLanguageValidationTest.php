<?php

declare(strict_types=1);

namespace Domain\Core\Language\Root\Test\Model\Aggregate\Language;

use App\Base\Tests\TestCase;
use App\Model\Values\Datetime\TimestampImp;
use App\Model\Values\Identificatiors\Id\BigIntId;
use App\Model\Values\Language\Code\CodeImp;
use App\Model\Values\Language\Name\NameImp;
use App\Model\Values\Language\NativeName\NativeNameImp;
use App\Model\Values\State\IsActiveImp;
use Domain\Core\Language\Root\Model\Aggregates\RootLanguage;

final class RootLanguageValidationTest extends TestCase
{
    private RootLanguage $language;

    public function setUp(): void
    {
        parent::setUp();

        $this->language = new RootLanguage(
            id: BigIntId::new(-1000),
            owner: BigIntId::new(-1000),
            name: NameImp::new('d'),
            nativeName: NativeNameImp::new('f'),
            code: CodeImp::new('ddsfdsf'),
            isActive: IsActiveImp::new(true),
            createdAt: TimestampImp::new('fdfg'),
        );
    }

    public function testGetErrors()
    {
        $errors = $this->language->validate();
        dd($errors);
    }
}
