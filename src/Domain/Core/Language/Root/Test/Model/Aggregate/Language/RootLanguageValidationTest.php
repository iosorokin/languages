<?php

declare(strict_types=1);

namespace Domain\Core\Language\Root\Test\Model\Aggregate\Language;

use App\Base\Tests\TestCase;
use App\Model\Values\Datetime\TimestampImp;
use App\Model\Values\Identificatiors\Id\BigIntId;
use Domain\Core\Language\Base\Model\Value\Code\CodeImp;
use Domain\Core\Language\Base\Model\Value\Name\NameImp;
use Domain\Core\Language\Base\Model\Value\NativeName\NativeNameImp;
use Domain\Core\Language\Root\Model\Aggregates\RootLanguageImp;

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

    private RootLanguageImp $language;

    public function setUp(): void
    {
        parent::setUp();

        $this->language = new RootLanguageImp(
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
