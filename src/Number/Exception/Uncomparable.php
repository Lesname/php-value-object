<?php
declare(strict_types=1);

namespace LessValueObject\Number\Exception;

use LessValueObject\Exception\AbstractValueObjectException;
use LessValueObject\Number\NumberValueObject;

/**
 * @psalm-immutable
 */
final class Uncomparable extends AbstractValueObjectException
{
    public function __construct(public NumberValueObject $left, public NumberValueObject $right)
    {
        $lClass = $left::class;
        $rClass = $right::class;

        parent::__construct("Cannot compare `{$lClass}` with `{$rClass}`");
    }
}
