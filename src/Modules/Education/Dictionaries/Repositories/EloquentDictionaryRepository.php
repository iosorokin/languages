<?php

declare(strict_types=1);

namespace Modules\Education\Dictionaries\Repositories;

use App\Contracts\Structures\DictionaryStructure;
use App\Extensions\Assert;
use Modules\Education\Dictionaries\Structures\DictionaryModel;

final class EloquentDictionaryRepository implements DictionaryRepository
{
    public function save(DictionaryStructure $dictionary): void
    {
        Assert::isInstanceOf($dictionary, DictionaryModel::class);
        $dictionary->save();
    }
}
