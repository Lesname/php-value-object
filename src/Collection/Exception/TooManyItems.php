<?php

declare(strict_types=1);

namespace LesValueObject\Collection\Exception;

use LesValueObject\Exception\AbstractException;

/**
 * @psalm-immutable
 */
final class TooManyItems extends AbstractException
{
    public function __construct(public readonly int $max, public readonly int $given)
    {
        parent::__construct("Too many items, maximal {$max}, given {$given}");
    }
}
