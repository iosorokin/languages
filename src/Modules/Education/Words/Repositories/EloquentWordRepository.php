<?php

declare(strict_types=1);

namespace Modules\Education\Words\Repositories;

use App\Extensions\Assert;
use Exception;
use Modules\Education\Words\Structures\WordModel;
use Modules\Education\Words\Structures\WordStructure;

final class EloquentWordRepository implements WordRepository
{
    public function getOrCreate(WordStructure $word): WordStructure
    {
        $this->assertModel($word);
        /** @var WordModel $word */

        try {
            $word->save();
        } catch (Exception) {
            $word = $this->getByWord($word->word);
        }

        return $word;
    }

    public function getByWord(string $word): ?WordStructure
    {
        return WordModel::whereWord($word)
            ->first();
    }

    private function assertModel(WordStructure $word): void
    {
        Assert::isInstanceOf($word, WordModel::class);
    }
}
