<?php
declare(strict_types=1);

namespace LessValueObject\Number\Exception;

use LessValueObject\Exception\AbstractException;

/**
 * @psalm-immutable
 */
final class PrecisionOutBounds extends AbstractException
{
    public function __construct(
        public readonly int $precision,
        public readonly float|int $given,
    ) {
        parent::__construct("Allowed {$precision}, given value {$given}");
    }
}
