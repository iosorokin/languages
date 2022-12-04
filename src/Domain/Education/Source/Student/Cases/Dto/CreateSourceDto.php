<?php

declare(strict_types=1);

namespace Domain\Education\Source\Student\Domain\Cases\Dto;

use Core\Base\Dto\BaseDto;
use Core\Base\Model\Values\Description\Description;
use Core\Base\Model\Values\Description\DescriptionImp;
use Core\Base\Model\Values\Identificatiors\Id\BigIntId;
use Core\Base\Model\Values\Identificatiors\Id\IntId;
use Core\Base\Model\Values\Title\Title;
use Core\Base\Model\Values\Title\TitleImp;
use Core\Domain\Models\Value\SourceType;
use Core\Domain\Models\Value\SourceTypeImp;
use Core\Infrastructure\Support\Validation\BaseValidator;
use Illuminate\Contracts\Support\Arrayable;

final class CreateSourceDto extends BaseDto
{
    private function __construct(
        public readonly IntId       $studentId,
        public readonly IntId       $languageId,
        public readonly Title       $title,
        public readonly Description $description,
        public readonly SourceType  $type,
    ) {}

    public static function create(array|Arrayable $data): self
    {
        $validated = static::validator()->validate($data);

        return new self(
            studentId: BigIntId::new($validated['student_id']),
            languageId: BigIntId::new($validated['language_id']),
            title: TitleImp::new($validated['title']),
            description: DescriptionImp::new($validated['description']),
            type: SourceTypeImp::new($validated['type']),
        );
    }

    private static function validator(): BaseValidator
    {
        return new class extends BaseValidator {
            protected function rules(): array
            {
                return [
                    'student_id' => ['required', 'id'],
                    'language_id' => ['required', 'id'],
                    'title' => ['required', 'string'],
                    'description' => ['required', 'string'],
                    'type' => ['required', 'string'],
                ];
            }
        };
    }
}
