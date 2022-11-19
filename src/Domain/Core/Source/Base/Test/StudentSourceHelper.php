<?php

declare(strict_types=1);

namespace Domain\Core\Source\Base\Test;

use App\Base\Model\Values\Identificatiors\Id\BigIntId;
use App\Base\Test\Helpers\ModuleHelper;
use Domain\Core\Source\Base\Controll\Command\CreateSourceImp;
use Domain\Core\Source\Base\Controll\Command\CreateSourceHandler;
use Domain\Core\Source\Base\Controll\Command\UpdateSourceImp;
use Domain\Core\Source\Base\Model\Entity\StudentSourceLanguage;
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

    public function getCreateSourceCommand(array $overwrite = []): CreateSourceImp
    {
        $attributes = $overwrite + $this->generateAttributes();

        return CreateSourceImp::new($attributes);
    }

    public function getUpdateSourceCommand(array $overwrite = []): UpdateSourceImp
    {
        $attributes = $overwrite + $this->generateAttributes();

        return UpdateSourceImp::new($attributes);
    }

    public function create(int $user, int $language, int $count = 1, array $overwrite = []): Generator
    {
        $overwrite['user'] = $user;
        $overwrite['language'] = $language;
        /** @var CreateSourceHandler $seedSource */
        $handler = app()->make(CreateSourceHandler::class);
        for ($i = 0; $i < $count; $i++) {
            $attributes = $overwrite + $this->generateAttributes();
            $command = CreateSourceImp::new($attributes);
            $source = $handler($command);

            yield $source;
        }
    }
}
