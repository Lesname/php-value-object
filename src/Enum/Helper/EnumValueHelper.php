<?php
declare(strict_types=1);

namespace LessValueObject\Enum\Helper;

/**
 * @psalm-immutable
 */
trait EnumValueHelper
{
    /**
     * @deprecated use property
     */
    public function getValue(): string
    {
        return $this->value;
    }

    public function jsonSerialize(): string
    {
        return $this->value;
    }
}
