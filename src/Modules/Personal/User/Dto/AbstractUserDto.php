<?php

namespace Modules\Personal\User\Dto;

use App\Base\BaseDto;

abstract class AbstractUserDto extends BaseDto
{
    protected ?string $_name;

    /**
     * @param null|string $name
     */
    public function setName(?string $name): void
    {
        $this->_name = $name;
    }

    /**
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->_name;
    }
}

