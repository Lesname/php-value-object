<?php
declare(strict_types=1);

namespace LessValueObject\Collection\Exception;

use LessValueObject\Exception\AbstractException;

/**
 * @psalm-immutable
 */
final class TooManyItems extends AbstractException
{
    public function __construct(public int $max, public int $given)
    {
        parent::__construct("Too many items, maximal {$max}, given {$given}");
    }
}
