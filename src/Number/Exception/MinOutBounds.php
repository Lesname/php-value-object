<?php
declare(strict_types=1);

namespace LesValueObject\Number\Exception;

use LesValueObject\Exception\AbstractException;

/**
 * @psalm-immutable
 */
final class MinOutBounds extends AbstractException
{
    /**
     * @psalm-pure
     */
    public function __construct(
        public readonly float|int $precision,
        public readonly float|int $given,
    ) {
        parent::__construct("Min {$precision}, given {$given}");
    }
}
