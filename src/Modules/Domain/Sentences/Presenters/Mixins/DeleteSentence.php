<?php

declare(strict_types=1);

namespace Modules\Domain\Sentences\Presenters\Mixins;

use App\Rules\BigIntId;
use Illuminate\Support\Facades\Validator;
use Modules\Domain\Sentences\Policies\SentencePolicy;
use Modules\Domain\Sentences\Presenters\Internal\GetSentence;
use Modules\Domain\Sentences\Repositories\SentenceRepository;
use Modules\Personal\User\Model\User;

final class DeleteSentence
{
    public function __construct(
        private GetSentence $getSentence,
        private SentencePolicy $policy,
        private SentenceRepository $sentenceRepository,
    ) {}

    public function __invoke(User $user, array $attributes): void
    {
        $attributes = Validator::validate($attributes, ['sentence_id' => ['required', new BigIntId()]]);
        $sentence = ($this->getSentence)($attributes['sentence_id']);
        $this->policy->canDelete($user, $sentence);
        $this->sentenceRepository->delete($sentence);
    }
}
