<?php

declare(strict_types=1);

namespace Domain\Student\Core\Source\Student\Test;

use App\Base\Helpers\ModuleHelper;
use Domain\Student\Core\Source\Student\Controll\Command\StudentCreateSource;
use Domain\Student\Core\Source\Student\Controll\Command\StudentCreateSourceHandler;
use Domain\Student\Core\Source\Student\Controll\Command\StudentUpdateSource;
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
