<?php

declare(strict_types=1);

namespace Domain\Student\Core\Language\Tests\Module;

use App\Base\Tests\TestCase;
use App\Model\Roles\RoleHelper;
use App\Model\Roles\Student;
use Domain\Student\Core\Language\Control\Queries\StudentFindLanguage;
use Domain\Student\Core\Language\Repositories\StudentLanguageRepository;
use Domain\Student\Core\Language\StudentLanguageModuleProd;
use Domain\Student\Core\Language\Tests\StudentLanguageModuleHelper;
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
