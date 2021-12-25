<?php
declare(strict_types=1);

namespace LessValueObject\Number\Exception;

use LessValueObject\Exception\AbstractValueObjectException;

/**
 * @psalm-immutable
 */
final class MinOutBounds extends AbstractValueObjectException
{
    public function __construct(
        public float|int $precision,
        public float|int $given,
    ) {
        parent::__construct("Min {$precision}, given {$given}");
    }
}
