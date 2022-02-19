<?php
declare(strict_types=1);

namespace LessValueObject\Enum;

use LessValueObject\ValueObject;

/**
 * @psalm-immutable
 */
interface EnumValueObject extends ValueObject
{
    public function getValue(): string;
}
