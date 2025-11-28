<?php

declare(strict_types=1);

namespace LesValueObject\Enum\Helper;

/**
 * @psalm-immutable
 */
trait EnumValueHelper
{
    public function jsonSerialize(): string
    {
        return $this->value;
    }
}
