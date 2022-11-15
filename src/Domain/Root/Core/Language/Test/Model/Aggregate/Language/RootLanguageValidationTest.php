<?php

declare(strict_types=1);

namespace Domain\Root\Core\Language\Test\Model\Aggregate\Language;

use App\Base\Tests\TestCase;
use App\Model\Values\Datetime\TimestampImp;
use App\Model\Values\Identificatiors\Id\BigIntId;
use App\Model\Values\Language\Code\CodeImp;
use App\Model\Values\Language\Name\NameImp;
use App\Model\Values\Language\NativeName\NativeNameImp;
use Domain\Root\Core\Language\Model\Aggregates\RootLanguage;

final class RootLanguageValidationTest extends TestCase
{
    private const EXPECTED_ERRORS = [
        'id',
        'owner',
        'name',
        'native_name',
        'code',
        'created_at',
    ];

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
            isActive: true,
            createdAt: TimestampImp::new('fdfg'),
        );
    }

    /**
     * Проверяем факт наличия ошибок
     */
    public function testGetErrors()
    {
        $errors = $this->language->validate();
        $this->assertSame(array_keys($errors), self::EXPECTED_ERRORS);
    }
}
