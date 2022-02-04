<?php
declare(strict_types=1);

namespace LessValueObject\Number\Exception;

use LessValueObject\Exception\AbstractException;
use LessValueObject\Number\NumberValueObject;

/**
 * @psalm-immutable
 */
final class Uncomparable extends AbstractException
{
    public function __construct(
        public readonly NumberValueObject $left,
        public readonly NumberValueObject $right,
    ) {
        $lClass = $left::class;
        $rClass = $right::class;

        parent::__construct("Cannot compare `{$lClass}` with `{$rClass}`");
    }
}
