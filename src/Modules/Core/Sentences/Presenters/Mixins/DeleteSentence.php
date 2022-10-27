<?php

declare(strict_types=1);

namespace Modules\Core\Sentences\Presenters\Mixins;

use App\Rules\BigIntId;
use Illuminate\Support\Facades\Validator;
use Modules\Core\Sentences\Policies\SentencePolicy;
use Modules\Core\Sentences\Presenters\Internal\GetSentence;
use Modules\Core\Sentences\Repositories\SentenceRepository;
use Modules\Personal\Infrastructure\Repository\Eloquent\EloquentUserModel;

final class DeleteSentence
{
    public function __construct(
        private GetSentence $getSentence,
        private SentencePolicy $policy,
        private SentenceRepository $sentenceRepository,
    ) {}

    public function __invoke(EloquentUserModel $user, array $attributes): void
    {
        $attributes = Validator::validate($attributes, ['sentence_id' => ['required', new BigIntId()]]);
        $sentence = ($this->getSentence)($attributes['sentence_id']);
        $this->policy->canDelete($user, $sentence);
        $this->sentenceRepository->delete($sentence);
    }
}
