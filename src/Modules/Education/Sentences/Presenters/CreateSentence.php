<?php

declare(strict_types=1);

namespace Modules\Education\Sentences\Presenters;

use App\Contracts\Contexts\Client;
use App\Contracts\Presenters\Education\Sentence\CreateSentencePresenter;

final class CreateSentence implements CreateSentencePresenter
{
    public function __construct()
    {
    }

    public function __invoke(Client $client, string $text)
    {
        
    }
}
