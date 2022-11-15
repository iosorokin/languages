<?php

declare(strict_types=1);

namespace Domain\Student\Core\Language\Tests;

use App\Base\Helpers\ModuleHelper;
use App\Model\Roles\Student;
use Domain\Student\Core\Language\Control\Queries\StudentFindLanguage;
use Domain\Student\Core\Language\Control\Queries\StudentGetStudentLanguages;
use Domain\Student\Core\Language\Model\Aggregates\StudentLanguage;
use Domain\Student\Core\Language\Model\Aggregates\StudentLanguageFactory;
use Domain\Student\Core\Language\Model\Collection\StudentLanguages;
use Domain\Student\Core\Language\StudentLanguageModule;
use Domain\Student\Core\Language\StudentLanguageModuleProd;
use Illuminate\Support\Str;

final class StudentLanguageModuleHelper extends ModuleHelper
{
    public function generateFullAttributes(Student $student): array
    {
        return [
            'id' => random_int(1, 1000),
            'student' => $student->id()->toInt(),
            'name' => Str::random(),
            'native_name' => $this->faker()->unique()->sentence(),
            'code' => $this->faker()->unique()->languageCode(),
            'is_learning' => (bool) random_int(0, 1),
            'is_active' => true,
        ];
    }

    public function getFindLanguageQuery(array $attributes): StudentFindLanguage
    {
        $query = StudentFindLanguage::new($attributes);

        return $query;
    }

    public function getLanguagesQuery(array $attributes = []): StudentGetStudentLanguages
    {
        $query = new StudentGetStudentLanguages($attributes);

        return $query;
    }

    public function createAggregate(Student $student, array $overwrite = []): StudentLanguage
    {
        $attributes = $overwrite + $this->generateFullAttributes($student);
        $language = $this->factory()->restoreFromArray($attributes);

        return $language;
    }

    public function createCollection(Student $student, int $count, array $overwrite = []): StudentLanguages
    {
        $languages = collect();
        for ($i = 0; $i < $count; $i++) {
            $language = $this->createAggregate($student, $overwrite);
            $languages->push($language);
        }

        return new StudentLanguages($languages);
    }

    public function factory(): StudentLanguageFactory
    {
        return app()->make(StudentLanguageFactory::class);
    }

    public function module(): StudentLanguageModule
    {
        return app()->make(StudentLanguageModuleProd::class);
    }
}
