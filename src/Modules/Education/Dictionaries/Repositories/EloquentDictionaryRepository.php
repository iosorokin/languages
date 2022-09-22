<?php

declare(strict_types=1);

namespace Modules\Education\Dictionaries\Repositories;

use App\Extensions\Assert;
use Modules\Education\Dictionaries\Structures\DictionaryModel;
use Modules\Education\Dictionaries\Structures\DictionaryStructure;

final class EloquentDictionaryRepository implements DictionaryRepository
{
    public function save(DictionaryStructure $dictionary): void
    {
        Assert::isInstanceOf($dictionary, DictionaryModel::class);
        $dictionary->save();
    }
}
