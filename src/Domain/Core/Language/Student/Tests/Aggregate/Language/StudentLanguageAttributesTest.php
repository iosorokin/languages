<?php

declare(strict_types=1);

namespace Domain\Core\Language\Student\Tests\Aggregate\Language;

use App\Base\Tests\UnitCase;
use App\Model\Roles\RoleHelper;
use App\Model\Roles\Student;
use Domain\Core\Language\Student\Model\Aggregates\StudentLanguageImp;
use Domain\Core\Language\Student\Tests\StudentLanguageModuleHelper;

final class StudentLanguageAttributesTest extends UnitCase
{
    private StudentLanguageImp $language;

    private Student $student;

    public function setUp(): void
    {
        parent::setUp();

        $helper = StudentLanguageModuleHelper::new();
        $this->student = RoleHelper::createStudent();
        $this->attributes = $helper->generateFullAttributes($this->student);
        $this->language = $helper->createAggregate($this->student, $this->attributes);
    }

    public function testReadOnlyValueObjectAttributes()
    {
        $this->assertNotSame($this->language->student(), $this->language->student());
        $this->assertNotSame($this->language->id(), $this->language->id());
        $this->assertNotSame($this->language->name(), $this->language->name());
        $this->assertNotSame($this->language->nativeName(), $this->language->nativeName());
        $this->assertNotSame($this->language->code(), $this->language->code());
    }
}
