<?php
declare(strict_types=1);

namespace LessValueObject\Number\Exception;

use LessValueObject\Exception\AbstractException;

/**
 * @psalm-immutable
 */
final class NotMultipleOf extends AbstractException
{
    public function __construct(public readonly float | int $value, public readonly float | int $of)
    {
        parent::__construct("Value {$value} is not multiple of {$of}");
    }
}
