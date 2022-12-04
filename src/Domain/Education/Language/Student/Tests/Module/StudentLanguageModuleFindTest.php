<?php

declare(strict_types=1);

namespace Domain\Education\Language\Student\Tests\Module;

use Core\Base\Model\Roles\RoleHelper;
use Core\Base\Model\Roles\Student;
use Core\Base\Test\TestCase;
use Domain\Education\Language\Student\Control\Queries\StudentFindLanguage;
use Domain\Education\Language\Student\Repositories\StudentLanguageRepository;
use Domain\Education\Language\Student\StudentLanguageModuleProd;
use Domain\Education\Language\Student\Tests\StudentLanguageModuleHelper;
use Mockery\MockInterface;

final class StudentLanguageModuleFindTest extends TestCase
{
    private StudentLanguageModuleProd $languageModule;

    private Student $student;

    private StudentFindLanguage $query;

    /** @test */
    public function __invoke()
    {
        $this->languageModule->find($this->student, $this->query);
        $this->assertTrue(true);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $helper = StudentLanguageModuleHelper::new();

        $this->languageModule = $helper->module();
        $this->student = RoleHelper::createStudent();

        $language = $helper->createAggregate($this->student);
        $this->query = $helper->getFindLanguageQuery([
            'code' => $language->code()->get(),
        ]);
        $this->mock(StudentLanguageRepository::class, function (MockInterface $mock) use ($language) {
            $mock->shouldReceive('find')
                ->andReturn($language);
        });
    }
}
