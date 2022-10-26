<?php

declare(strict_types=1);

namespace Modules\Domain\Analysis\Actions;

use App\Database\Personal\EloquentUserModel;
use Modules\Domain\Analysis\Factories\AnalysisFactory;
use Modules\Domain\Analysis\Model\Analysis;
use Modules\Domain\Analysis\Policies\AnalysisPolicy;
use Modules\Domain\Analysis\Validators\CreateAnalysisValidator;
use Modules\Domain\Sentences\Presenters\Internal\GetSentence;
use Modules\Domain\Sources\Presenters\Internal\GetSource;

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
