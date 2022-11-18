<?php

declare(strict_types=1);

namespace Domain\Core\Language\Student\Tests;

use App\Base\Helpers\ModuleHelper;
use App\Model\Roles\Student;
use Domain\Core\Language\Student\Control\Queries\StudentFindLanguage;
use Domain\Core\Language\Student\Control\Queries\StudentGetStudentLanguages;
use Domain\Core\Language\Student\Model\Aggregates\StudentLanguageImp;
use Domain\Core\Language\Student\Model\Collection\StudentLanguages;
use Domain\Core\Language\Student\StudentLanguageModule;
use Domain\Core\Language\Student\StudentLanguageModuleProd;
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

    public function createAggregate(Student $student, array $overwrite = []): StudentLanguageImp
    {
        $attributes = $overwrite + $this->generateFullAttributes($student);
        $language = StudentLanguageImp::restoreFromArray($attributes);

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

    public function module(): StudentLanguageModule
    {
        return app()->make(StudentLanguageModuleProd::class);
    }
}
