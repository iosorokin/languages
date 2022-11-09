<?php

declare(strict_types=1);

namespace Domain\Core\Analysis\Helpers;

use App\Base\Helpers\ModuleHelper;
use Domain\Core\Analysis\Model\Analysis;
use Domain\Core\Analysis\Presenters\SeedAnalysis;
use Domain\Core\Sentences\Model\Sentence;
use Infrastructure\Database\Repositories\Personal\Eloquent\EloquentUserModel;

final class AnalysisSeedHelper extends ModuleHelper
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
