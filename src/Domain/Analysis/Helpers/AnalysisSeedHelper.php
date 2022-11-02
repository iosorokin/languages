<?php

declare(strict_types=1);

namespace Domain\Analysis\Helpers;

use App\Base\Helpers\AppHelper;
use Infrastructure\Database\Repositories\Personal\Eloquent\EloquentUserModel;
use Domain\Analysis\Model\Analysis;
use Domain\Analysis\Presenters\SeedAnalysis;
use Domain\Sentences\Model\Sentence;

final class AnalysisSeedHelper extends AppHelper
{
    public function generateAttributes(): array
    {
        return [
            'translate' => $this->faker()->realText(),
            'description' => $this->faker()->realText()
        ];
    }

    public function create(EloquentUserModel $user, Sentence $sentence, array $overwrite): Analysis
    {
        $attributes = $this->generateAttributes() + $overwrite;
        $attributes['sentence_id'] = $sentence->getId();
        /** @var SeedAnalysis $presenter */
        $presenter = app()->make(SeedAnalysis::class);

        return $presenter($user, $attributes);
    }
}
