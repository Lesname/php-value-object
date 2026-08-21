<?php

declare(strict_types=1);

namespace LesValueObject\Number\Exception;

use LesValueObject\Exception\AbstractException;

/**
 * @psalm-immutable
 */
final class MaxOutBounds extends AbstractException
{
    /**
     * @psalm-pure
     */
    public function __construct(
        public readonly float|int $max,
        public readonly float|int $given,
    ) {
        parent::__construct("Max {$max}, given {$given}");
    }
}
