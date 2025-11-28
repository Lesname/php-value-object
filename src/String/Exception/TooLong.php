<?php

declare(strict_types=1);

namespace LesValueObject\String\Exception;

use LesValueObject\Exception\AbstractException;

/**
 * @psalm-immutable
 */
final class TooLong extends AbstractException
{
    public function __construct(public readonly int $maximal, public readonly int $given)
    {
        parent::__construct("Maximal {$maximal} characters allowed, given {$given}");
    }
}
