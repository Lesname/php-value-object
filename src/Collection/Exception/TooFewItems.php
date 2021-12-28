<?php
declare(strict_types=1);

namespace LessValueObject\Collection\Exception;

use LessValueObject\Exception\AbstractException;

/**
 * @psalm-immutable
 */
final class TooFewItems extends AbstractException
{
    public function __construct(public int $min, public int $given)
    {
        parent::__construct("Too few items, minimal {$min}, given {$given}");
    }
}
