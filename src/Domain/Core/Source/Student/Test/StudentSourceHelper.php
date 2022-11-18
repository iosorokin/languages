<?php

declare(strict_types=1);

namespace Domain\Core\Source\Student\Test;

use App\Base\Helpers\ModuleHelper;
use App\Model\Values\Identificatiors\Id\BigIntId;
use Domain\Core\Source\Student\Controll\Command\StudentCreateSource;
use Domain\Core\Source\Student\Controll\Command\StudentCreateSourceHandler;
use Domain\Core\Source\Student\Controll\Command\StudentUpdateSource;
use Domain\Core\Source\Student\Model\Entity\StudentSourceLanguage;
use Generator;
use Illuminate\Support\Arr;

final class StudentSourceHelper extends ModuleHelper
{
    public function generateFullAttributes(): array
    {
        $attributes = [
            'id' => random_int(1, 10000),
            'created_at' => now(),
        ];

        return $this->generateAttributes() + $attributes;
    }

    public function generateAttributes(): array
    {
        return [
            'student' => random_int(1, 1000),
            'language' => random_int(1, 1000),
            'type' => Arr::random(['movie', 'song']),
            'title' => $this->faker()->title(),
            'description' => $this->faker()->text(),
        ];
    }

    public function generateLanguageAttributes(): array
    {
        return [
            'id' => random_int(1, 10000),
            'is_active' => (bool) random_int(0, 1),
        ];
    }

    public function createLanguageEntity(array $overwrite = []): StudentSourceLanguage
    {
        $attributes = $overwrite + $this->generateLanguageAttributes();

        return new StudentSourceLanguage(
            id: BigIntId::new( $attributes['id']),
            isActive: $attributes['is_active']
        );
    }

    public function getCreateSourceCommand(array $overwrite = []): StudentCreateSource
    {
        $attributes = $overwrite + $this->generateAttributes();

        return StudentCreateSource::new($attributes);
    }

    public function getUpdateSourceCommand(array $overwrite = []): StudentUpdateSource
    {
        $attributes = $overwrite + $this->generateAttributes();

        return StudentUpdateSource::new($attributes);
    }

    public function create(int $user, int $language, int $count = 1, array $overwrite = []): Generator
    {
        $overwrite['user'] = $user;
        $overwrite['language'] = $language;
        /** @var StudentCreateSourceHandler $seedSource */
        $handler = app()->make(StudentCreateSourceHandler::class);
        for ($i = 0; $i < $count; $i++) {
            $attributes = $overwrite + $this->generateAttributes();
            $command = StudentCreateSource::new($attributes);
            $source = $handler($command);

            yield $source;
        }
    }
}
