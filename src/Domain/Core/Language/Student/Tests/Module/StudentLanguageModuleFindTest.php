<?php

declare(strict_types=1);

namespace Domain\Core\Language\Student\Tests\Module;

use App\Base\Tests\TestCase;
use App\Model\Roles\RoleHelper;
use App\Model\Roles\Student;
use Domain\Core\Language\Student\Control\FindLanguage;
use Domain\Core\Language\Student\LanguageModuleProd;
use Mockery\MockInterface;

final class StudentLanguageModuleFindTest extends TestCase
{
    private LanguageModuleProd $languageModule;

    private Student $student;

    private FindLanguage $command;

    /** @test */
    public function __invoke()
    {
        $this->languageModule->find($this->student, $this->command);
        $this->assertTrue(true);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $helper = LanguageModuleHelper::new();

        $this->languageModule = $helper->module();
        $this->student = RoleHelper::createStudent();

        $language = $helper->create();
        $this->command = $helper->getFindLanguageQuery([
            'id' => $language->id()->toInt(),
        ]);
        $this->mock(LanguageRepository::class, function (MockInterface $mock) use ($language) {
            $mock->shouldReceive('find')
                ->andReturn($language);
        });
    }
}
