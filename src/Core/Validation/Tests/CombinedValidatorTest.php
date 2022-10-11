<?php

declare(strict_types=1);

namespace Core\Validation\Tests;

use Core\Base\Tests\UnitCase;
use Core\Validation\Tests\Fakes\FakeCombinedValidator;
use Core\Validation\Tests\Fakes\FakeFouthSingleValidator;
use Illuminate\Validation\ValidationException;

final class CombinedValidatorTest extends UnitCase
{
    private FakeCombinedValidator $validator;

    protected function setUp(): void
    {
        parent::setUp();

        $this->validator = new FakeCombinedValidator();
        $this->validator->add(FakeFouthSingleValidator::class);
    }

    /**
     * @dataProvider correctAttributesDataProvider
     */
    public function testDataSuccessfullyValidated(array $attributes)
    {
        $validated = $this->validator->validate($attributes);
        $different = array_diff(array_keys($attributes), array_keys($validated));
        $this->assertEmpty($different);
    }

    /**
     * @dataProvider incorrectAttributesDataProvider
     */
    public function testValidationExceptionThrew(array $attributes)
    {
        try {
            $this->validator->validate($attributes);
        } catch (ValidationException $e) {
            $errors = $e->errors();
        }

        $expected = ['email', 'name', 'count'];
        $actual = array_keys($errors ?? []);
        $different = array_diff($expected, $actual);
        $this->assertEmpty($different);
    }

    public function correctAttributesDataProvider(): array
    {
        return [
            [
                [
                    'email' => 'test@test.ru',
                    'password' => 'paswordpass',
                    'name' => 'myname',
                    'surname' => 'mysurname',
                    'count' => 1,
                    'min' => 2,
                    'max' => 3,
                    'oldest' => true,
                    'newest' => false,
                ]
            ]
        ];
    }

    public function incorrectAttributesDataProvider(): array
    {
        return [
            [
                [
                    'password' => 'paswordpass',
                    'surname' => 'mysurname',
                    'min' => 2,
                    'max' => 3,
                    'newest' => false,
                ]
            ]
        ];
    }
}
