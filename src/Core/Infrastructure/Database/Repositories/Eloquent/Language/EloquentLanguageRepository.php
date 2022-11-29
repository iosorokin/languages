<?php

declare(strict_types=1);

namespace Core\Infrastructure\Database\Repositories\Eloquent\Language;

use Core\Base\Collections\Collection;
use App\Education\Language\Base\Control\Query\FindLanguage;
use App\Education\Language\Base\Control\Query\GetLanguages;
use App\Education\Language\Base\Model\Enum\LanguageStatusEnum;
use App\Education\Language\Base\Repository\LanguageRepository;
use App\Education\Language\Base\Repository\Query\Search\SearchByName;
use App\Education\Language\Base\Repository\Structure\LanguageStructure;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Core\Infrastructure\Database\Repositories\Eloquent\Language\Eloquent\Model\LanguageModel;

final class EloquentLanguageRepository implements LanguageRepository
{
    public function find(FindLanguage $dto): LanguageStructure
    {
        // TODO: Implement find() method.
    }

    public function get(GetLanguages $dto): Collection
    {
        $collection = DB::table((new LanguageModel())->getTable())
            ->lazy()
            ->when($dto->search() instanceof SearchByName, function (Builder $builder) use ($dto) {
                $builder->where('name', '%' . $dto->search()->value());
            })
            ->where('status', LanguageStatusEnum::Active->value)
            ->get(50);

        $collection->tapEach();

        $collection = new Collection($collection);

        return ;
    }
}
