<?php
declare(strict_types=1);

namespace LessValueObject\Number\Exception;

use LessValueObject\Exception\AbstractValueObjectException;

/**
 * @psalm-immutable
 */
final class MaxOutBounds extends AbstractValueObjectException
{
    public function __construct(
        public float|int $max,
        public float|int $given,
    ) {
        parent::__construct("Max {$max}, given {$given}");
    }
}
