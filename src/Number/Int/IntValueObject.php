<?php
declare(strict_types=1);

namespace LessValueObject\Number\Int;

use LessValueObject\Number\NumberValueObject;

/**
 * @psalm-immutable
 */
interface IntValueObject extends NumberValueObject
{
    public function getValue(): int;
}
