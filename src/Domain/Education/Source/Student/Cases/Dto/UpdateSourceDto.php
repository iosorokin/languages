<?php

declare(strict_types=1);

namespace Domain\Education\Source\Student\Domain\Cases\Dto;

use Core\Base\Dto\BaseDto;
use Core\Base\Model\Values\Description\Description;
use Core\Base\Model\Values\Description\DescriptionImp;
use Core\Base\Model\Values\Title\Title;
use Core\Base\Model\Values\Title\TitleImp;
use Core\Domain\Models\Value\SourceType;
use Core\Domain\Models\Value\SourceTypeImp;
use Core\Infrastructure\Support\Validation\BaseValidator;
use Illuminate\Contracts\Support\Arrayable;

final class UpdateSourceDto extends BaseDto
{
    private function __construct(
        public readonly Title       $title,
        public readonly Description $description,
        public readonly SourceType  $type,
    ) {}

    public static function create(array|Arrayable $data): self
    {
        $validated = static::validator()->validate($data);

        return new self(
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
                    'title' => ['string'],
                    'description' => ['string'],
                    'type' => ['string'],
                ];
            }
        };
    }
}
