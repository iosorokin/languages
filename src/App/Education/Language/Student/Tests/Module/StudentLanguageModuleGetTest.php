<?php

declare(strict_types=1);

namespace App\Education\Language\Student\Tests\Module;

use Core\Base\Model\Roles\RoleHelper;
use Core\Base\Model\Roles\Student;
use Core\Base\Test\ModuleCase;
use App\Education\Language\Student\Control\Queries\StudentGetStudentLanguages;
use App\Education\Language\Student\Repositories\StudentLanguageRepository;
use App\Education\Language\Student\StudentLanguageModuleProd;
use App\Education\Language\Student\Tests\StudentLanguageModuleHelper;
use Mockery\MockInterface;

final class StudentLanguageModuleGetTest extends ModuleCase
{
    private StudentLanguageModuleProd $languageModule;

    private Student $student;

    private StudentGetStudentLanguages $query;

    /** @test */
    public function __invoke()
    {
        $this->languageModule->get($this->student, $this->query);
        $this->assertTrue(true);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $helper = StudentLanguageModuleHelper::new();

        $this->languageModule = $helper->module();
        $this->student = RoleHelper::createStudent();

        $languages = $helper->createCollection($this->student,100);
        $this->query = $helper->getLanguagesQuery();
        $this->mock(StudentLanguageRepository::class, function (MockInterface $mock) use ($languages) {
            $mock->shouldReceive('get')
                ->andReturn($languages);
        });
    }
}
