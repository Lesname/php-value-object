<?php
declare(strict_types=1);

namespace LessValueObject\String\Exception;

use LessValueObject\Exception\AbstractValueObjectException;

/**
 * @psalm-immutable
 */
final class TooShort extends AbstractValueObjectException
{
    public function __construct(public int $minimal, public int $given)
    {
        parent::__construct("Minimal {$minimal} characters needed, given {$given}");
    }
}
