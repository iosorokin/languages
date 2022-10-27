<?php

declare(strict_types=1);

namespace Modules\Core\Analysis\Actions;

use Modules\Core\Analysis\Factories\AnalysisFactory;
use Modules\Core\Analysis\Model\Analysis;
use Modules\Core\Analysis\Policies\AnalysisPolicy;
use Modules\Core\Analysis\Validators\CreateAnalysisValidator;
use Modules\Core\Sentences\Presenters\Internal\GetSentence;
use Modules\Core\Sources\Presenters\Internal\GetSource;
use Modules\Personal\Infrastructure\Repository\Eloquent\EloquentUserModel;

final class CreateAnalysis
{
    public function __construct(
        private CreateAnalysisValidator $validator,
        private GetSentence             $getSentence,
        private GetSource               $getSource,
        private AnalysisPolicy          $policy,
        private AnalysisFactory         $factory,
    ) {}

    public function __invoke(EloquentUserModel $user, array $attributes): Analysis
    {
        $attributes = $this->validator->validate($attributes);
        $sentence = $this->getSentence->getOrThrowBadRequest((int) $attributes['sentence_id']);
        $source = $this->getSource->getOrThrowException($sentence->source_id);
        $sentence->source()->associate($source);
        $this->policy->canCreate($user, $sentence);
        $analysis = $this->factory->create($sentence, $user, $attributes);
        $analysis->save();

        return $analysis;
    }
}
