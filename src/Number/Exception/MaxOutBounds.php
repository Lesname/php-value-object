<?php
declare(strict_types=1);

namespace LessValueObject\Number\Exception;

use LessValueObject\Exception\AbstractException;

/**
 * @psalm-immutable
 */
final class MaxOutBounds extends AbstractException
{
    public function __construct(
        public readonly float|int $max,
        public readonly float|int $given,
    ) {
        parent::__construct("Max {$max}, given {$given}");
    }
}
