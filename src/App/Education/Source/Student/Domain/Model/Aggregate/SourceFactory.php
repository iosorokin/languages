<?php

declare(strict_types=1);

namespace App\Education\Source\Student\Domain\Model\Aggregate;

use App\Education\Source\Student\Controll\Cases\Dto\CreateSourceDto;
use App\Education\Source\Student\Domain\Model\Value\SourceTypeImp;
use Core\Base\Model\Values\Datetime\Now;
use Core\Base\Model\Values\Description\DescriptionImp;
use Core\Base\Model\Values\Identificatiors\Id\BigIntId;
use Core\Base\Model\Values\Identificatiors\Id\LazyId;
use Core\Base\Model\Values\Title\TitleImp;

final class SourceFactory
{
    public static function create(CreateSourceDto $dto): Source
    {
        return new Source(
            id: LazyId::new(),
            studentId: BigIntId::new($dto->studentId),
            languageId: BigIntId::new($dto->languageId),
            title: TitleImp::new($dto->title),
            description: DescriptionImp::new($dto->description),
            type: SourceTypeImp::new($dto->type),
            createdAt: Now::new(),
        );
    }
}
