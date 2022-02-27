<?php
declare(strict_types=1);

namespace LessValueObject\Enum\Helper;

/**
 * @psalm-immutable
 */
trait EnumValueHelper
{
    public function getValue(): string
    {
        return $this->value;
    }

    public function jsonSerialize(): string
    {
        return $this->value;
    }
}
