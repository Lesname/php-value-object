<?php
declare(strict_types=1);

namespace LessValueObject\Enum;

/**
 * @psalm-immutable
 */
enum FilterMode: string implements EnumValueObject
{
    case Exclusive = 'exclusive';
    case Inclusive = 'inclusive';

    public function jsonSerialize(): string
    {
        return $this->value;
    }
}
