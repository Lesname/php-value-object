<?php
declare(strict_types=1);

namespace LessValueObject\Number\Exception;

use LessValueObject\Exception\AbstractValueObjectException;

/**
 * @psalm-immutable
 */
final class PrecisionOutBounds extends AbstractValueObjectException
{
    public function __construct(
        public int $precision,
        public float|int $given,
    ) {
        parent::__construct("Allowed {$precision}, given value {$given}");
    }
}
