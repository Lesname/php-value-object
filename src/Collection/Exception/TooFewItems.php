<?php

declare(strict_types=1);

namespace LesValueObject\Collection\Exception;

use LesValueObject\Exception\AbstractException;

/**
 * @psalm-immutable
 */
final class TooFewItems extends AbstractException
{
    public function __construct(public readonly int $min, public readonly int $given)
    {
        parent::__construct("Too few items, minimal {$min}, given {$given}");
    }
}
