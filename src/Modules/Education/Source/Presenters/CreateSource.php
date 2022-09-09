<?php

namespace Modules\Education\Source\Presenters;

use App\Contracts\Presenters\Languages\Learning\CreateSourcePresenter;
use Modules\Education\Source\Dto\CreateSourceDto;

class CreateSource implements CreateSourcePresenter
{
    public function __invoke(array $attributes)
    {
        $language = '';
        $dto = CreateSourceDto::new($language, $attributes);
    }
}
